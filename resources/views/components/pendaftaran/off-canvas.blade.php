<div>
    <div id='viewer' style='width:auto;height:550px;margin:0 auto'></div>
</div>

<script src="{{ asset('assets/libs/pdfjsexpress/webviewer.min.js') }}"></script>
<script>
    WebViewer({
        path: '/assets/libs/pdfjsexpress', // path to the PDF.js Express'lib' folder on your server
        licenseKey: '6d7646SuhMqJVyD70UzH',
        initialDoc: '{{ Storage::url($data->data_berkas) }}',
        // initialDoc: '/path/to/my/file.pdf',  // You can also use documents on your server
    }, document.getElementById('viewer'))
        .then(instance => {
            // now you can access APIs through the WebViewer instance
            const {
                Core,
                UI
            } = instance;

            // adding an event listener for when a document is loaded
            Core.documentViewer.addEventListener('documentLoaded', () => {
                console.log('document loaded');
            });

            // adding an event listener for when the page number has changed
            Core.documentViewer.addEventListener('pageNumberUpdated', (pageNumber) => {
                console.log(`Page number is: ${pageNumber}`);
            });
        });
</script>

