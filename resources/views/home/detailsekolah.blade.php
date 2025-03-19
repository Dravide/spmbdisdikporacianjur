<x-home.app>
    <section class="hero-4 pb-5 pt-7 py-sm-7">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7 text-center">
                    <h1 class="hero-title mb-3">{{$datas->nama_sekolah}}</h1>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="row mb-5">
                <div class="col-lg-4 col-md-12" style="margin-bottom: 1.5rem">
                    <div id="map" style="width:auto; height: 100%; min-height: 350px"></div>

                </div>
                <div class="col-lg-8 col-md-12">
                    <h2>Detail {{$datas->nama_sekolah}}</h2>
                    <p>{{$datas->alamat_jalan}}</p>
                    <hr>
                    <div class="row">
                        <div class="col-md-6 col-lg-6 col-sm-12 total-pendaftar">
                            <div class="d-flex align-items-center card-body">
                                    <img src="data:image/png;base64,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"
                                         class="img-fluid avatar-md d-block rounded me-3">
                                <div class="flex-grow-1">
                                    <h3>{{$jumlahPendaftar}} <br> Pendaftar</h3>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6 col-lg-6 col-sm-12 total-pendaftar">
                            <div class="d-flex align-items-center card-body">
                                <img src="data:image/png;base64,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"
                                     class="img-fluid avatar-md d-block rounded me-3">
                                <div class="flex-grow-1">
                                    <h3>{{$jumlahPendaftarTerverifikasi}} <br> Terverifikasi</h3>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body bg-soft-success rounded-2" data-aos="fade-up">
                                    <div class="d-flex align-items-center">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAFGElEQVR4nO1Za2wUVRReEEx8RKBa5tzZLbU82lopIaJQlZ27S1vENYLRVFP7MAoao0iftiQktuWhmCLSFsSttdV27p1mTYQgvwi2iUY0aWOj3TuoUYwRjRrRSFCU1l4zW3c7s91pp9slpnFOcrK7d86c+b7zuDNz1uGwxRZb/t+SmornC4L7aQC8FwAXZ2VlXemYKQLgeUAAfA4Q5mEVAH+OkPuWabqe5XLlXOW4fILnCAj79cCNJKQ/FyKpTAMyRcezEcLlAsI/AZKGAUlBAFyQcPgA0v1RoM8ISNoFCP9mWAd8DCF8gxWfTid2AcI9MQLyN0LuooQSEEW8UgD8178lIyclrb5OW0924aUCkvqisnEWwIMnC4gwrhSli5HvCKvThFxwBQAu0Zo0XBYa2Fi1rjWxgPBLgPDIGCBpWEC4QfOjtxWE/GsEkFqNEQ/Z1icn42v1a3FDX7hw7WIA/IGuLEomsu9Su3OISlmd3MjT0vNDWdIB+UgQ3Gmj4PFyQNJg1AbwDYBbCvvSH4sLPIDkA4TPR9X1OAIA+FZR9LQ8e2h3q6zSIaIqXNNX3m/jd2woHIoqjZ+1qIdLECJ+JWXBgrx5Br+644Qpz9MgfSYQDFjbphHCmVFNeUlAeHusnUV0en7UbDKW+0LA9SoHKX90RzUXnR5dSRn0PIBUGjOAegJjPt+yGv2juqh/Yba3y0zZbHIhg+4JvMwzV9xjyAYAPpWc7F0Sy2/gq8C8WH61DFsiIID0a/hkLRvRxzsGOubLjCqaUysENO38VDbYOkzuE0Qlt8sq/dLMryUCEzUQYd15hNGzYYdWCUTbdp0OZOj99vb2ziFMqZcZHZ7Ib9wE6njdbMKU/TKjI2agpkKAqMoFoipbA8FAkhZ1wpR+K37jJkBUpdYCqKkQ4PHYxk1AVqk6swkw5TubALIzwO0SInYTY3sXmlTsbVS1b2TcvhODhUeJNwY6DZHSfk/0fKO9tZm9vRGdtrzrj/hMW5Z/eZ6FGsg+np49CiisGdk+vlPZbwps75FmXvDU1tAnMbFpfOcgX7FmU8Sn976SxBLoHCS8uLqSI6cn5mROdHn4I7VVvGuQTvrESaK0snkndy1aF/HldHn5C283JY5AS08rz8l90AB46U0beGltVehTv37n3YX88HttUyKQfdtY5FMX5/Ht/j3jbOImUH1w17m0ZesNIN2+h0PjE82x/1Q7xxuLDMeXZN7Fd7S/aJlAcVUFR6InFKSmk6+Ot2HKt1YJXIqkUZtbAm7TA3OmePnm52pCYxP9BbSyKa2pHBJ15aUBeqhsW+ilXm/b8XEX3/TYk9yVuo4XVZVH1tv73zQlKDO6zRIBAaSBWPWt6c2r7h1Xl2NKjwaCAdAmbKLL84P+vNXeAt580j/aqMeNjbooLXfi7DDlomXwoQyA5NPG5NHgfcVb+Ot94yMkM/oHYUoZ5zwyKhHF3OuRiI/rz0+5MS/UG/pGBYR5YXnZBAQok4PySsvgI1kQJC8APhGaHAP+pOJA/S+x06r0KaqSbuJmFgCuAOQxDrV0jVrZ1GBWLiOEUb+//9jVjkQIYfRM1AWGZZXu9vf75052LkLeVWKK90M9eM/GYn7gxGGzkvm+S1XWJwR4rLGKzOjXJEjWxjPt3lJXs6+l57XfTRtVVY6Qz4ilP0amLJTRNYR1F0w3rVrJyUzpiwJ/QVbp446ZIv5+/1xyWnmCMEqIShtlJqf+15hsscUxw+Qf7u92+9n8UFUAAAAASUVORK5CYII="
                                             class="img-fluid avatar-md d-block rounded me-3">
                                        <div class="flex-grow-1">
                                            <h4 class="mt-0 mb-0 fw-bold">{{$countZonasi}} Pendaftar</h4>
                                            <p class="text-muted fw-medium mb-0">Zonasi</p>
                                            <span class="badge rounded mt-3 badge-soft-success px-2 py-1">{{$countZonasiVerified}} Telah Terverifikasi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body bg-soft-info rounded-2" data-aos="fade-up">
                                    <div class="d-flex align-items-center">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAAC80lEQVR4nO2YPWhUQRDHFyPaiJrj7mbm3XlBiRYphDSSYG7nYoIYT0FiLCwsjZUEtbI03RXJvSo22ms6S20UFSEvaK0oaCNECwOi+E6iJ/uSM5v7fLmvt6f3h2G592aP+e3OzrBPiK666qoF4p1A8jaQ/IDIDyIRRtFJAuI5JM4XDJBfCXGhR3SC4vETMUDp6gCeobwRDidJmC4ATm2uvPxRAkLyPSJfEqapr4/3Ex1PCCF2AMqsyv1olIcQ+WMpBP8Mx+RhYYoAkgcB5SoS/4qSnNHfWdbIESA5DyhfbzkXwGeEKSLic3pwRHxZfx+PD4UQ5VsttVbVjglT1N9/ajcgP9UD1KsOEN/U3rlGrX5BRBzWDurawMDALlWRvKpEfOsvAPGcMFHR2MhRre5/95rYBgwgv9ksp3xPmCgimSxTbUoN+ZEwUeFwkpDkt6KAvxYDAMlZYaqIkicB5XNEfqEObiTCe6KWHEbi+0jyHZBcUGcj6Di7Mk4AqTSQXAbkXK1DrHw8X0ilhQkCS571VX3KwYABEGo16wYgdoKOX+hpEwod21vLv7d3fJ+eTiJo6Svayjkt0z8LYDvu+ayTW7GdXL7Y9DlWfOx3oFWrEkCl4IsBMOiqVXkHygffEAC1oGo1CpB58sV71tSqpXdWQH6ZSIz0es/VZZ3kmv6HjQLYG8/qWSTfnVXdedXXBj34cmYGAG3trNV2oJkAtk//rONONq2z6vnZPoDcSlObTLsBbCeXX1zM9/yfAFnHnSxuUNsNpp45Vmx0vWvHRhsFKO2u7QAYuzjr+aqxIYBmBFPvnMzj9YbXsQC2Zh0HMD33MD88cd0bOxIgcWjC81VjTQC9kalGVQ1A5aUejJ6n1XJ5O3Mymr91YNwHQAOX9FbboJz2kUIoTwcdKFawqwvPagN4uwCpNBIv1fpQpbZ0kK/kp67d8Ub1u1YQm3Pu+ppT8C8E7wugkqpdE9tl2SX3s6hX6qJuO7lPQQY/v+xO1Q1gov4AKUrJqowDaPIAAAAASUVORK5CYII="
                                        class="img-fluid avatar-md d-block rounded me-3">
                                        <div class="flex-grow-1">
                                            <h4 class="mt-0 mb-0 fw-bold">{{$countPrk}} Pendaftar</h4>
                                            <p class="text-muted fw-medium mb-0">Prestasi Ranking</p>
                                            <span class="badge rounded mt-3 badge-soft-primary px-2 py-1">{{$countPrkVerified}} Telah Terverifikasi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body bg-soft-warning rounded-2" data-aos="fade-up">
                                    <div class="d-flex align-items-center">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACZ0lEQVR4nO2ZMW/TQBTHLVQhOjAgJO69yqZRJpQQUEEVVdTcDUXMwIjEhgTqRIUKEixdwoQqlA5MMDB15Bs01AdLyxdgYywzqCk2OnQBu3ZkBzs+O3Z1T3pDbOXu//Pze7bfMwxt2rQlMDZDkD4lSPcJsJ8A9KU8appLswTYLiATSR2R7hmGccooztgMIN0JC6E/5BmADk0j3ndgbwuDIEifjYh3skSgcAiCdN/b9ALS541G4/Qk60RD0He5QxBgR96Gk4qXFh8Jmi9EcDNV6xCkbwqDgBgA8dmcdThsORy/uxzF/zy4jmOjeHL/6u9CIOIApPgkwqMA5O9fuyge31sIHSfIXhUIkOzKxwFEQgD7WhhAGvHSLet4ncM+hiA2HrbE9SvtwcLl9qPSAtxavuGvs7nWDEG4vsMXYV88V0qA3noj5cOO+g/MUgAMPs6J2yuLqSAIsKPSAHgQMhLydgrmBIzxUgFMUrEEP3+20gCuDZ8yQUwdgKNwbNiuNgCHQW4A3dWWME2a+ntA/qe72koEID03gHqtk1q85/VaZ/oAlY+AW0AOuBoAT3AEulXPgbquQqiTeKzpMspPSBUyx1QdtypVKO7dx9URGGM6ifmUk5jEtNfzeg867B8DyM5FdoDAgAOAvvAg8hK/udb0AWT7RQXAyIgpm+McEw/uXhu22F2O4v3GJVGbjy7DsoeUGeDfhLKvEkL6tw/WUNhKeyny/J2bi8NGmAKA0Jh1L5gTqiNgWX9vm631Zki8Y+OBodocG3p5JbI74g6H18oBhiMmG3ry6uQm3MYDKV7szJ9RDqDNUGN/AIkJBUMMpOnqAAAAAElFTkSuQmCC"
                                        class="img-fluid avatar-md d-lg-none d-md-none rounded me-3">
                                        <div class="flex-grow-1">
                                            <h4 class="mt-0 mb-0 fw-bold">{{$countPra}} Pendaftar</h4>
                                            <p class="text-muted fw-medium mb-0">Jalur Prestasi Raport</p>
                                            <span class="badge rounded mt-3 badge-soft-warning px-2 py-1">{{$countPraVerified}} Telah Terverifikasi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body bg-soft-danger rounded-2" data-aos="fade-up">
                                    <div class="d-flex align-items-center">
                                        <img src="data:image/png;base64,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"
                                        class="img-fluid avatar-md d-lg-none d-md-none rounded me-3">
                                        <div class="flex-grow-1">
                                            <h4 class="mt-0 mb-0 fw-bold">{{$countPna}} Pendaftar</h4>
                                            <p class="text-muted fw-medium mb-0">Prestasi Non Akademik</p>
                                            <span class="badge rounded mt-3 badge-soft-danger px-2 py-1">{{$countPnaVerified}} Telah Terverifikasi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body bg-soft-info rounded-2" data-aos="fade-up">
                                    <div class="d-flex align-items-center">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACGElEQVR4nO2ZO0/DMBCAs4AQMCFVvpROtF2yFgST3Qw8liIVMZWxAhYmygYMXVhaqP0L+ieYYACJARb4B6ywI4EEA0Z2W4j6TMijseSTThddbOc+++yLEsPQokWLC8lNAOBjBOQRAfkEk/CQ9QuZ+DaRsNOGX7EsaxJMfB9B0LxX8Y1vAAByMp7gCRer7RsAAXn6HRTwoUgnV+COQLy2ARd9vQD85rxIJ7f9YgMA/xws9gDNZnOKUtqglL4yxni3Ovv1uz+sDfT3PwQKIIIfFFhIAPy/AN/twb67AF6VAECA71pHGr5z+ocFHy8AtDqDEMkL6xeAUio1UoBB4gWgVjvnxeIuz2TXpYpr4QNVALLZjZ4q2+1jYQEkUiQDgCvCegFYSK+5fmVIZ9ZDPYWe24M9ewEoFMo9M763fyS1e/YLm+VQAfrWgVEAjQblOzsHPG+XeKl0IHO+c09cC1/eLsk2om3sAPwoaACH6BVgOoW43sSgTyGmj1GmUiEzk3n5PGGVrMSLS1vyecIqCVCvX/BK5VRaJQHYANUAhuorgKL7vM7lJl4sBgswDmUawHTMiOPzepi5DmGtQCq1MtfxKwOAgHz8rQC5tCxrVikAAHw9rg2cnLf9AxhGbhqAvI0DYHllOwiAFgQCcoWAvEcR+HzKlsFXq2dBAfTKqP8DsanEg4RSeq40QLP1j0xAvEQRPKX0PlCAuMgP/2ogMtWjR1oAAAAASUVORK5CYII="
                                        class="img-fluid avatar-md d-lg-none d-md-none rounded me-3">

                                        <div class="flex-grow-1">
                                            <h4 class="mt-0 mb-0 fw-bold">{{$countPtz}} Pendaftar</h4>
                                            <p class="text-muted fw-medium mb-0">Jalur Prestasi Tahfidz</p>
                                            <span class="badge rounded mt-3 badge-soft-info px-2 py-1">{{$countPtzVerified}} Telah Terverifikasi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body bg-soft-dark rounded-2" data-aos="fade-up">
                                    <div class="d-flex align-items-center">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACGElEQVR4nO2ZO0/DMBCAs4AQMCFVvpROtF2yFgST3Qw8liIVMZWxAhYmygYMXVhaqP0L+ieYYACJARb4B6ywI4EEA0Z2W4j6TMijseSTThddbOc+++yLEsPQokWLC8lNAOBjBOQRAfkEk/CQ9QuZ+DaRsNOGX7EsaxJMfB9B0LxX8Y1vAAByMp7gCRer7RsAAXn6HRTwoUgnV+COQLy2ARd9vQD85rxIJ7f9YgMA/xws9gDNZnOKUtqglL4yxni3Ovv1uz+sDfT3PwQKIIIfFFhIAPy/AN/twb67AF6VAECA71pHGr5z+ocFHy8AtDqDEMkL6xeAUio1UoBB4gWgVjvnxeIuz2TXpYpr4QNVALLZjZ4q2+1jYQEkUiQDgCvCegFYSK+5fmVIZ9ZDPYWe24M9ewEoFMo9M763fyS1e/YLm+VQAfrWgVEAjQblOzsHPG+XeKl0IHO+c09cC1/eLsk2om3sAPwoaACH6BVgOoW43sSgTyGmj1GmUiEzk3n5PGGVrMSLS1vyecIqCVCvX/BK5VRaJQHYANUAhuorgKL7vM7lJl4sBgswDmUawHTMiOPzepi5DmGtQCq1MtfxKwOAgHz8rQC5tCxrVikAAHw9rg2cnLf9AxhGbhqAvI0DYHllOwiAFgQCcoWAvEcR+HzKlsFXq2dBAfTKqP8DsanEg4RSeq40QLP1j0xAvEQRPKX0PlCAuMgP/2ogMtWjR1oAAAAASUVORK5CYII="
                                             class="img-fluid avatar-md d-lg-none d-md-none rounded me-3">

                                        <div class="flex-grow-1">
                                            <h4 class="mt-0 mb-0 fw-bold">{{$countAfr}} Pendaftar</h4>
                                            <p class="text-muted fw-medium mb-0">Jalur Afirmasi</p>
                                            <span class="badge rounded mt-3 badge-soft-dark px-2 py-1">{{$countAfrVerified}} Telah Terverifikasi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body bg-soft-success rounded-2" data-aos="fade-up">
                                    <div class="d-flex align-items-center">
                                        <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAADAAAAAwCAYAAABXAvmHAAAACXBIWXMAAAsTAAALEwEAmpwYAAACZ0lEQVR4nO2ZMW/TQBTHLVQhOjAgJO69yqZRJpQQUEEVVdTcDUXMwIjEhgTqRIUKEixdwoQqlA5MMDB15Bs01AdLyxdgYywzqCk2OnQBu3ZkBzs+O3Z1T3pDbOXu//Pze7bfMwxt2rQlMDZDkD4lSPcJsJ8A9KU8appLswTYLiATSR2R7hmGccooztgMIN0JC6E/5BmADk0j3ndgbwuDIEifjYh3skSgcAiCdN/b9ALS541G4/Qk60RD0He5QxBgR96Gk4qXFh8Jmi9EcDNV6xCkbwqDgBgA8dmcdThsORy/uxzF/zy4jmOjeHL/6u9CIOIApPgkwqMA5O9fuyge31sIHSfIXhUIkOzKxwFEQgD7WhhAGvHSLet4ncM+hiA2HrbE9SvtwcLl9qPSAtxavuGvs7nWDEG4vsMXYV88V0qA3noj5cOO+g/MUgAMPs6J2yuLqSAIsKPSAHgQMhLydgrmBIzxUgFMUrEEP3+20gCuDZ8yQUwdgKNwbNiuNgCHQW4A3dWWME2a+ntA/qe72koEID03gHqtk1q85/VaZ/oAlY+AW0AOuBoAT3AEulXPgbquQqiTeKzpMspPSBUyx1QdtypVKO7dx9URGGM6ifmUk5jEtNfzeg867B8DyM5FdoDAgAOAvvAg8hK/udb0AWT7RQXAyIgpm+McEw/uXhu22F2O4v3GJVGbjy7DsoeUGeDfhLKvEkL6tw/WUNhKeyny/J2bi8NGmAKA0Jh1L5gTqiNgWX9vm631Zki8Y+OBodocG3p5JbI74g6H18oBhiMmG3ry6uQm3MYDKV7szJ9RDqDNUGN/AIkJBUMMpOnqAAAAAElFTkSuQmCC"
                                             class="img-fluid avatar-md d-lg-none d-md-none rounded me-3">
                                        <div class="flex-grow-1">
                                            <h4 class="mt-0 mb-0 fw-bold">{{$countPto}} Pendaftar</h4>
                                            <p class="text-muted fw-medium mb-0">Pindah Tugas</p>
                                            <span class="badge rounded mt-3 badge-soft-success px-2 py-1">{{$countPtoVerified}} Telah Terverifikasi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body bg-soft-primary rounded-2" data-aos="fade-up">
                                    <div class="d-flex align-items-center">
                                        <img src="data:image/png;base64,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"
                                             class="img-fluid avatar-md d-lg-none d-md-none rounded me-3">
                                        <div class="flex-grow-1">
                                            <h4 class="mt-0 mb-0 fw-bold">{{$countAg}} Pendaftar</h4>
                                            <p class="text-muted fw-medium mb-0">Anak Guru</p>
                                            <span class="badge rounded mt-3 badge-soft-primary px-2 py-1">{{$countAgVerified}} Telah Terverifikasi</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>





                    </div>

                </div>

            </div>
{{--            Section Table--}}
            <div class="row mb-5">
                {{ $dataTable->table() }}

            </div>
        </div>
    </section>


    @push('css')
        <link href='https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.css' rel='stylesheet' type="text/css"/>
        <link rel="stylesheet"
              href="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v5.0.0/mapbox-gl-geocoder.css"
              type="text/css">
        <!-- Icons Css -->
        <link href="{{asset('')}}assets/css/icons.min.css" rel="stylesheet" type="text/css" />
        <!-- DataTables -->
        <link href="{{asset('')}}assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('')}}assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />

        <!-- Responsive datatable examples -->
        <link href="{{asset('')}}assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    @endpush
    @push('js')
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.14.1/mapbox-gl.js"></script>
        <script src="https://api.mapbox.com/mapbox-gl-js/plugins/mapbox-gl-geocoder/v4.7.0/mapbox-gl-geocoder.min.js"></script>
        <script>
            $(document).ready(function () {
                const lat = {{$datas->lintang}};
                const lon = {{$datas->bujur}};
                mapboxgl.accessToken =
                    "pk.eyJ1IjoicHBkYnNtcGRpc2Rpa3BvcmFjaWFuanVyIiwiYSI6ImNsdDVlYml1cDBkNDgybW8waHI1OGhwa2IifQ.whC4Fw1qIp4n4_5NR1rWGQ";
                var map = new mapboxgl.Map({
                    container: "map",
                    style: "mapbox://styles/ppdbsmpdisdikporacianjur/clvcfxxfx00i101qzalpjgfvl",
                    center: [lon ? lon : 107.13182, lat ? lat : -6.81463],
                    zoom: 16,
                });
                console.log(lat, lon);
                var marker = new mapboxgl.Marker({color: "#4aa3ff"})
                    .setLngLat([lon, lat])
                    .addTo(map);
                map.addControl(
                    new MapboxGeocoder({
                        accessToken: mapboxgl.accessToken,
                        mapboxgl: mapboxgl,
                    })
                );
            });
        </script>
        <!-- Datatable init js -->
        <script src="{{asset('')}}assets/libs/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="{{asset('')}}assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="{{asset('')}}assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{asset('')}}assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js"></script>
        <!-- Responsive examples -->
        <script src="{{asset('')}}assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{asset('')}}assets/js/pages/datatables.init.js"></script>

        <script src="{{asset('')}}assets/js/app.js"></script>
        {{ $dataTable->scripts() }}
    @endpush

</x-home.app>
