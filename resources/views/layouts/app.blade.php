<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Gestions des ID {{-- config('app.name', 'Laravel') --}}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
        <link rel="stylesheet" type="text/css" href="{{asset('myStyles/css/bootstrap.min.css')}}" />
        <!-- Styles -->        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">


        <link rel="stylesheet" type="text/css" href="{{asset('myStyles/css/fontawesome-free-6.1.1-web/css/all.css')}}" />
        <link rel="stylesheet" type="text/css" href="{{asset('myStyles/css/mainStyle.css')}}" />

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screenM bg-gray-100">
            @include('layouts.navigation')

            {{--
            <!-- Page Heading -->
            <!-- header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header --> --}}

            <!-- Page Content -->
            <div class="container mt-3 bg-dangerM card bg-light">
                <div class="row bg-dangerM pt-1">
                    <div class="col-md-5 bg-dangerM">
                        <form action="{{route('searche')}}" method="get">
                            {{-- @csrf --}}
                            <div class="input-group input-group-sm btn-dangerM mt-2M" style="widthM: 500px;">
                                <input type="text" name="AgentSearch" id="AgentSearch" class="form-control float-right" placeholder="Recherche par nom ou postnom ou prenom agent" value="{{request()->AgentSearch ?? '' }}" />
                                <div class="input-group-append btn-dangerM" style="background-color: silver;">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-5 bg-dangerM">
                        <div class="col-sm-1 float-end">
                            <a href="{{route('dashboard')}}" class="btn btn-block mt-1" title="actualiser la page"><i class="fas fa-sync"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2 bg-successM">
                        <button class="btn bg-adra float-end" data-bs-toggle="modal" data-bs-target="#formAjoutAgent"><i class="fa-solid fa-plus"></i> Ajout ID agent</button>
                    </div>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nom</th>
                            <th scope="col">Postnom</th>
                            <th scope="col">Prénom</th>
                            <th scope="col">Sexe</th>
                            <th scope="col">ID agent</th>
                            <th scope="col">Num Carte Identité</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($listesAgents as $item)
                        <tr>
                            <th scope="row">{{$loop->index + 1}}</th>
                            <td>{{$item->nom}}</td>
                            <td>{{$item->postnom}}</td>
                            <td>{{$item->prenom}}</td>
                            <td>{{$item->sexe}}</td>
                            <td>{{$item->idagent}}</td>
                            <td>{{$item->numcarteidentite}}</td>
                            <td>
                                <!-- a href="#" class="btn btn-success"><i class="fa-solid fa-eye"></i>Voir</a -->
                                <a id="{{$item->id}}" href="{{ route('edit',[$item->id]) }}" class="btn btn-primary btnModifAgent" data-bs-toggle="modal" data-bs-target="#formModiftAgent">
                                    <i class="fa-solid fa-pen-to-square"></i> Edit
                                </a>
                                <a id="{{$item->id}}" href="{{ route('delete',[$item->id]) }}" class="btn btn-danger btnDeleteIDagent">
                                    <i class="fa-solid fa-trash-can"></i> Del
                                </a>
                               {{-- <a href="#" class="btn btn-danger" onclick="if(confirm('voulez-vous vraiment supprimer cette ID de l\'agent ?')){document.getElementById('form-{{$item->id}}').submit()}" data-target="#delete{{ $item->id }}"><i class="fa-solid fa-trash-can"></i> Del
                                </a>
                                <form id="form-{{$item->id}}" method="POST" action="{{ route('delete',[$item->id]) }}">
                                                        @csrf
                                    <input type="hidden" name="_method" value="delete" />
                                </form> --}}
                            </td>
                        </tr> 
                        @empty
                        <tr>
                            <td colspan="8"><h1 class="bg-adra text-center fs-1">Pas des données trouvées</h1></td>                            
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <!-- /End Card table -->
        </div>

        <!-- Formulaire Ajout agent -->
            @include('Pages.agent.AddAgentIncludModal')
        <!-- /End Formulaire Ajout agent -->

        <!-- Formulaire Ajout agent -->
            @include('Pages.agent.ModifAgentIncludModal')
        <!-- /End Formulaire Ajout agent -->
        <script src="{{asset('myStyles/js/jquery.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('myStyles/js/bootstrap.bundle.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('myStyles/js/jquery.validate.min.js')}}" type="text/javascript"></script>
        <script src="{{asset('myStyles/sweetalert2-11.4.4/sweetalert2.all.min.js')}}" type="text/javascript"></script>
        <script type="text/javascript">
            /*Swal.fire({
              icon: 'success',
              title: 'Enregistrement effectué avec success',
              
            }).then((result) => {
                if(result.isConfirmed){
                    window.location.reload();
                }
            });*/
        </script>
        @include('Pages.agent.AgentAjax')
    </body>
</html>
