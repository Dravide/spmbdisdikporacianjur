<div>
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">Peta Lokasi Pendaftar</h4>
        </div>
        <div class="card-body">
            <!-- Add search input -->
            <div class="mb-3">
                <div class="input-group">
                    <input type="text" id="search-input" class="form-control" placeholder="Cari nama pendaftar...">
                    <button class="btn btn-primary" type="button" id="search-button">Cari</button>
                </div>
                <div id="search-results" class="list-group mt-2" style="max-height: 200px; overflow-y: auto; display: none;"></div>
            </div>
            <div id="map" style="width: 100%; height: 600px;"></div>
        </div>
    </div>

    @push('style')
    <link href='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet' />
    <style>
        .mapboxgl-popup {
            max-width: 200px;
        }
        .mapboxgl-popup-content {
            text-align: center;
            padding: 15px;
        }
        .search-result-item {
            cursor: pointer;
            padding: 8px 15px;
        }
        .search-result-item:hover {
            background-color: #f8f9fa;
        }
    </style>
    @endpush

    @push('scripts')
    <script src='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js'></script>
    <script>
        document.addEventListener('livewire:initialized', function () {
            // Replace with your Mapbox access token
            mapboxgl.accessToken = 'pk.eyJ1IjoicHBkYnNtcGRpc2Rpa2NpYW5qdXIiLCJhIjoiY204ZnNrbHNoMGczdDJqcHhucTdjZmNtZyJ9.Ary-pbzrfR8kLH-A13ZWLw';
            
            const map = new mapboxgl.Map({
                container: 'map',
                style: 'mapbox://styles/mapbox/streets-v12',
                center: [107.1402, -7.1340], // Default center (Cianjur coordinates)
                zoom: 10
            });

            map.addControl(new mapboxgl.NavigationControl());
            
            // Get school coordinates from authenticated user
            const schoolCoordinates = {
                longitude: {{ Auth::user()->sekolah->bujur ?? 'null' }},
                latitude: {{ Auth::user()->sekolah->lintang ?? 'null' }}
            };
            
            // Add school marker and radius if coordinates exist
            if (schoolCoordinates.longitude && schoolCoordinates.latitude) {
                // Add school marker
                const schoolMarker = new mapboxgl.Marker({ color: '#FF0000' })
                    .setLngLat([schoolCoordinates.longitude, schoolCoordinates.latitude])
                    .addTo(map);
                
                // Add popup with school information
                const schoolPopup = new mapboxgl.Popup({ offset: 25 })
                    .setHTML(`
                        <h5>{{ Auth::user()->sekolah->nama_sekolah }}</h5>
                        <p>Lokasi Sekolah</p>
                    `);
                
                schoolMarker.setPopup(schoolPopup);
                
                // Add radius circle around school (500 meter radius)
                map.on('load', function() {
                    // Create a circle with turf.js for more accurate radius
                    const radius = 0.7; // 500 meters in kilometers
                    const options = { steps: 64, units: 'kilometers' };
                    const point = [schoolCoordinates.longitude, schoolCoordinates.latitude];
                    
                    // Load Turf.js for circle calculation
                    const script = document.createElement('script');
                    script.src = 'https://unpkg.com/@turf/turf@6/turf.min.js';
                    script.onload = function() {
                        const circle = turf.circle(point, radius, options);
                        
                        map.addSource('school-radius', {
                            'type': 'geojson',
                            'data': circle
                        });
                        
                        map.addLayer({
                            'id': 'school-radius-layer',
                            'type': 'fill',
                            'source': 'school-radius',
                            'paint': {
                                'fill-color': '#4668F2',
                                'fill-opacity': 0.2,
                                'fill-outline-color': '#4668F2'
                            }
                        });
                        
                        // Add outline
                        map.addLayer({
                            'id': 'school-radius-outline',
                            'type': 'line',
                            'source': 'school-radius',
                            'paint': {
                                'line-color': '#4668F2',
                                'line-width': 2
                            }
                        });
                    };
                    document.head.appendChild(script);
                });
                
                // Center map on school with closer zoom
                map.flyTo({
                    center: [schoolCoordinates.longitude, schoolCoordinates.latitude],
                    zoom: 15,
                    essential: true
                });
            }
            
            // Add markers for each student
            const students = @json($students);
            const bounds = new mapboxgl.LngLatBounds();
            const studentMarkers = {}; // Store markers by student ID for search functionality
            
            students.forEach(student => {
                if (student.koordinat && student.koordinat.latitude && student.koordinat.longitude) {
                    const marker = new mapboxgl.Marker({ color: '#3FB618' })
                        .setLngLat([student.koordinat.longitude, student.koordinat.latitude])
                        .addTo(map);
                    
                    // Add popup with student information
                    const popup = new mapboxgl.Popup({ offset: 25 })
                        .setHTML(`
                            <h5>${student.dapodik.nama || 'Pendaftar'}</h5>
                            <p>NISN: ${student.nisn || '-'}</p>
                        `);
                    
                    marker.setPopup(popup);
                    
                    // Store marker reference with student ID
                    if (student.id) {
                        studentMarkers[student.id] = {
                            marker: marker,
                            coordinates: [student.koordinat.longitude, student.koordinat.latitude],
                            name: student.dapodik.nama || 'Pendaftar',
                            nisn: student.nisn || '-'
                        };
                    }
                    
                    // Extend bounds to include this marker
                    bounds.extend([student.koordinat.longitude, student.koordinat.latitude]);
                }
            });
            
            // If we have markers and no school coordinates, fit the map to show all markers
            if (!bounds.isEmpty() && (!schoolCoordinates.longitude || !schoolCoordinates.latitude)) {
                map.fitBounds(bounds, {
                    padding: 50,
                    maxZoom: 15
                });
            } else if (!bounds.isEmpty() && schoolCoordinates.longitude && schoolCoordinates.latitude) {
                // If we have both school and student markers, include school in bounds
                bounds.extend([schoolCoordinates.longitude, schoolCoordinates.latitude]);
                map.fitBounds(bounds, {
                    padding: 50,
                    maxZoom: 15
                });
            }
            
            // Search functionality
            const searchInput = document.getElementById('search-input');
            const searchButton = document.getElementById('search-button');
            const searchResults = document.getElementById('search-results');
            
            // Function to perform search
            function performSearch() {
                const searchTerm = searchInput.value.toLowerCase().trim();
                if (searchTerm.length < 2) {
                    searchResults.style.display = 'none';
                    return;
                }
                
                // Filter students based on search term
                const matchingStudents = students.filter(student => 
                    student.dapodik && 
                    student.dapodik.nama && 
                    student.dapodik.nama.toLowerCase().includes(searchTerm) &&
                    student.koordinat && 
                    student.koordinat.latitude && 
                    student.koordinat.longitude
                );
                
                // Display search results
                searchResults.innerHTML = '';
                
                if (matchingStudents.length === 0) {
                    searchResults.innerHTML = '<div class="list-group-item">Tidak ada hasil yang ditemukan</div>';
                } else {
                    matchingStudents.forEach(student => {
                        const resultItem = document.createElement('div');
                        resultItem.className = 'list-group-item search-result-item';
                        resultItem.innerHTML = `
                            <strong>${student.dapodik.nama}</strong>
                            <div>NISN: ${student.nisn || '-'}</div>
                        `;
                        
                        // Add click event to zoom to student location
                        resultItem.addEventListener('click', function() {
                            if (studentMarkers[student.id]) {
                                // Fly to student location
                                map.flyTo({
                                    center: studentMarkers[student.id].coordinates,
                                    zoom: 18,
                                    essential: true
                                });
                                
                                // Open the popup
                                studentMarkers[student.id].marker.togglePopup();
                                
                                // Hide search results
                                searchResults.style.display = 'none';
                                
                                // Clear search input
                                searchInput.value = '';
                            }
                        });
                        
                        searchResults.appendChild(resultItem);
                    });
                }
                
                searchResults.style.display = 'block';
            }
            
            // Search button click event
            searchButton.addEventListener('click', performSearch);
            
            // Search input keyup event (search as you type)
            searchInput.addEventListener('keyup', function(e) {
                if (e.key === 'Enter') {
                    performSearch();
                } else if (searchInput.value.length >= 2) {
                    performSearch();
                } else if (searchInput.value.length === 0) {
                    searchResults.style.display = 'none';
                }
            });
            
            // Hide search results when clicking outside
            document.addEventListener('click', function(e) {
                if (!searchInput.contains(e.target) && !searchResults.contains(e.target) && !searchButton.contains(e.target)) {
                    searchResults.style.display = 'none';
                }
            });
        });
    </script>
    @endpush
</div>