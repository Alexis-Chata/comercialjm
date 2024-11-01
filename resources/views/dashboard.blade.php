<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="grid grid-cols-1 md:grid-cols-2">
                    <div class="py-6">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                                <div class="row px-6" title="Pedidos">
                                    <form action="{{ route('productos.post') }}" class="py-6" method="post"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mt-4" target="_blank" href="https://docs.google.com/spreadsheets/d/1iDCb6-g33PhLmLBwkveH6m8QRq1kHjQBRys5h4ASjt8/edit?usp=sharing">Formato CSV Subida</a>
                                        <br>
                                        <br>
                                        <label for="file" class="cursor-pointer">Subir archivo Productos</label>
                                        <input type="file" name="file" id="file" required
                                            class="mt-4 cursor-pointer block w-full mb-4 text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                                        <button type="submit"
                                            class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition mt-4 justify-center w-full">Subir
                                            Archivo</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Loading HTML -->
    <div id="divloading" class="loading show">
        <div class="spin"></div>
    </div>
    <!-- Loading HTML -->

    @push('estiloscss')
        <!-- Loading CSS -->
        <style>
            .loading {
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                background-color: white;
                display: flex;
                justify-content: center;
                align-items: center;
                z-index: 9999;
                transition: 1s all;
                opacity: 0;
            }

            .loading.show {
                opacity: 1;
            }

            .loading .spin {
                border: 3px solid hsla(185, 100%, 62%, 0.2);
                border-top-color: #3cefff;
                border-radius: 50%;
                width: 3em;
                height: 3em;
                animation: spin 1s linear infinite;
            }

            @keyframes spin {
                to {
                    transform: rotate(360deg);
                }
            }
        </style>
        <!-- Loading CSS -->
        {{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" /> --}}
    @endpush

    @push('eventsubmit-js')
        <script>
            document.body.addEventListener("keyup", function(event) {
                // El parámetro del evento es del tipo KeyboardEvent
                if (event.code === 'Escape' || event.keyCode === 27) {
                    console.log(event.code);
                    alert('Esc pulsado');
                    window.location.href = "{{ route('dashboard') }}";
                }
            });
            document.body.addEventListener('submit', cargando);

            function cargando(event) {
                console.log(event);
                const clickedElement = event.target;
                clickedElement.parentNode.classList.add("relative");
                clickedElement.classList.add("opacity-50");

                buttons = document.querySelectorAll("body main button");
                inputs = document.querySelectorAll("body main input[type=file]");

                buttons.forEach((element) => element.classList.add("pointer-events-none"));
                inputs.forEach((element) => element.classList.add("pointer-events-none"));

                const div = document.createElement("div");
                div.innerHTML =
                    '<div id="cargando" role="status" class="hidden absolute -translate-x-1/2 -translate-y-1/2 top-2/4 left-1/2"><svg aria-hidden="true" class="w-8 h-8 text-gray-200 animate-spin dark:text-gray-600 fill-blue-600" viewBox="0 0 100 101" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M100 50.5908C100 78.2051 77.6142 100.591 50 100.591C22.3858 100.591 0 78.2051 0 50.5908C0 22.9766 22.3858 0.59082 50 0.59082C77.6142 0.59082 100 22.9766 100 50.5908ZM9.08144 50.5908C9.08144 73.1895 27.4013 91.5094 50 91.5094C72.5987 91.5094 90.9186 73.1895 90.9186 50.5908C90.9186 27.9921 72.5987 9.67226 50 9.67226C27.4013 9.67226 9.08144 27.9921 9.08144 50.5908Z" fill="currentColor" /><path d="M93.9676 39.0409C96.393 38.4038 97.8624 35.9116 97.0079 33.5539C95.2932 28.8227 92.871 24.3692 89.8167 20.348C85.8452 15.1192 80.8826 10.7238 75.2124 7.41289C69.5422 4.10194 63.2754 1.94025 56.7698 1.05124C51.7666 0.367541 46.6976 0.446843 41.7345 1.27873C39.2613 1.69328 37.813 4.19778 38.4501 6.62326C39.0873 9.04874 41.5694 10.4717 44.0505 10.1071C47.8511 9.54855 51.7191 9.52689 55.5402 10.0491C60.8642 10.7766 65.9928 12.5457 70.6331 15.2552C75.2735 17.9648 79.3347 21.5619 82.5849 25.841C84.9175 28.9121 86.7997 32.2913 88.1811 35.8758C89.083 38.2158 91.5421 39.6781 93.9676 39.0409Z" fill="currentFill" /></svg><span class="sr-only">Loading...</span></div>';
                clickedElement.parentNode.appendChild(div);

                clickedElement.parentNode.querySelector("div#cargando").classList.remove("hidden");

                forms = document.querySelectorAll("main form");
                forms.forEach((element) => element.classList.add("opacity-50"));

            }
        </script>

        <!-- Loading Javascript -->
        <script type="text/javascript">
            window.onload = function() {
                divloading = document.getElementById("divloading");
                divloading.classList.remove("show", "loading");
            };
        </script>
        <!-- Loading Javascript -->
        {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script> --}}
    @endpush
</x-app-layout>
