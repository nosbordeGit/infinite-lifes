   @props(['visitados'])
   <div class="col-md-6 col-lg-12 order-md-last">
       <ul class="list-group mb-3">
           <h4 class="d-flex justify-content-between align-items-center mb-3">
               <span class="text-primary">{{ __('Your visiteds') }}</span>
               <span class="badge bg-primary rounded-pill">{{ $visitados->count() }}</span>
           </h4>
           @foreach ($visitados as $visitado)
               <li class="list-group-item d-flex justify-content-between lh-sm mt-1">
                   <div>
                       <h6 class="my-0">{{ $visitado->livro->titulo }}</h6>
                       <small class="text-body-secondary">{{ __('Language') }}: {{ $visitado->livro->idioma }}</small>
                       <small class="text-body-secondary">{{ __('Edition') }}: {{ $visitado->livro->edicao }}</small>
                       <small class="text-body-secondary">{{ __('Vendor') }}:
                           {{ $visitado->livro->vendedor->empresa }}</small>

                       <div class="row">
                           <div class="col-4">
                               <form action="{{ route('pedido.formulario') }}" method="GET">
                                   <x-text-input id="tipo_id" class="block mt-1 w-full" type="hidden" name="tipo_id"
                                       :value="'livro'" />
                                   <x-text-input id="livro_id" class="block mt-1 w-full" type="hidden"
                                       name="livro_id" :value="$visitado->livro->id" />
                                   <x-primary-button>{{ __('Order') }}</x-primary-button>
                               </form>
                           </div>

                           <div class="col-8">
                               <smal class="text-body-secondary">{{ __('Visited on') }}:
                                   {{ $visitado->created_at }}
                                </smal>
                           </div>
                       </div>
                   </div>
                   <span class="text-body-secondary">R${{ $visitado->livro->valor }}</span>
               </li>
           @endforeach
       </ul>
   </div>
