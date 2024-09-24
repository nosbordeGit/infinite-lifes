<div class="container my-4 mx-8">
    <div class="card shadow-lg p-3 bg-body-tertiary rounded">
        <div class="card-body">
            <form method="POST" action="{{ route('livro.store') }}" enctype="multipart/form-data">
                @csrf

                <x-h1 class="card-title" :value="__('Register of Book')"></x-h1>

                <div class="my-3">
                    <x-input-label for="titulo" :value="__('Title')" />
                    <x-text-input id="titulo" class="block mt-1 w-full" type="text" name="titulo"
                        :value="old('titulo')" autofocus autocomplete="titulo" />
                    <x-input-error :messages="$errors->get('titulo')" class="mt-2" />
                </div>

                <div>
                    <x-input-label for="titulo" :value="__('Summary')" />
                    <x-textarea id="resumo" class="block mt-1 w-full form-control" type="text" name="resumo"
                        required />
                    <x-input-error :messages="$errors->get('resumo')" class="mt-2" />
                </div>

                <div class="my-3">
                    <x-input-label for="quantidade_paginas" :value="__('Quantity of Pages')" />
                    <x-text-input id="quantidade_paginas" class="block mt-1 w-full" type="number"
                        name="quantidade_paginas" :value="old('quantidade_paginas')" autocomplete="quantidade_paginas" />
                    <x-input-error :messages="$errors->get('quantidade_paginas')" class="mt-2" />
                </div>

                <div class="my-3">
                    <x-input-label for="valor" :value="__('Value')" />
                    <x-text-input id="valor" class="block mt-1 w-full" type="number" name="valor"
                        :value="old('valor')" autocomplete="valor" />
                    <x-input-error :messages="$errors->get('valor')" class="mt-2" />
                </div>

                <div class="my-3">
                    <x-input-label for="estoque" :value="__('Stock')" />
                    <x-text-input id="estoque" class="block mt-1 w-full" type="number" name="estoque"
                        :value="old('estoque')" autocomplete="estoque" />
                    <x-input-error :messages="$errors->get('estoque')" class="mt-2" />
                </div>

                <div class="my-3">
                    <x-input-label for="autor" :value="__('Author')" />
                    <x-text-input id="autor" class="block mt-1 w-full" type="text" name="autor"
                        :value="old('autor')" autocomplete="autor" />
                    <x-input-error :messages="$errors->get('autor')" class="mt-2" />
                </div>

                <div class="my-3">
                    <x-input-label for="isbn13" :value="__('ISBN13')" />
                    <x-text-input id="isbn13" class="block mt-1 w-full" type="text" name="isbn13"
                        :value="old('isbn13')" autocomplete="isbn13" />
                    <x-input-error :messages="$errors->get('isbn13')" class="mt-2" />
                </div>

                <div class="my-3">
                    <x-input-label for="idioma" :value="__('Language')" />
                    <x-text-input id="idioma" class="block mt-1 w-full" type="text" name="idioma"
                        :value="old('idioma')" autocomplete="idioma" />
                    <x-input-error :messages="$errors->get('idioma')" class="mt-2" />
                </div>

                <div class="my-3">
                    <x-input-label for="edicao" :value="__('Edition')" />
                    <x-text-input id="edicao" class="block mt-1 w-full" type="number" name="edicao"
                        :value="old('edicao')" autocomplete="edicao" />
                    <x-input-error :messages="$errors->get('edicao')" class="mt-2" />
                </div>

                <div class="my-3">
                    <x-input-label for="editora" :value="__('Publisher')" />
                    <x-text-input id="editora" class="block mt-1 w-full" type="text" name="editora"
                        :value="old('editora')" autocomplete="editora" />
                    <x-input-error :messages="$errors->get('editora')" class="mt-2" />
                </div>

                <div class="my-3">
                    <x-input-label for="dimensao" class="form-label" :value="__('Dimension')" />
                    <x-select class="form-select" id="dimensao" name="dimensao">
                        @foreach ($dimensoes as $dimensao)
                            <option value="{{ $dimensao->id }}">{{ $dimensao->valor }}</option>
                        @endforeach
                    </x-select>
                </div>

                <div class="my-3">
                    <x-input-label for="idade" :value="__('Age')" />
                    <x-text-input id="idade" class="block mt-1 w-full" type="number" name="idade"
                        :value="old('idade')" autocomplete="idade" />
                    <x-input-error :messages="$errors->get('idade')" class="mt-2" />
                </div>

                <div class="my-3">
                    <x-input-label for="data_publicacao" :value="__('Publication Date')" />
                    <x-text-input id="data_publicacao" class="block mt-1 w-full" type="date"
                        name="data_publicacao" :value="old('data_publicacao')" autocomplete="data_publicacao" />
                    <x-input-error :messages="$errors->get('data_publicacao')" class="mt-2" />
                </div>

                <div class="my-3">
                    <x-input-label for="imagem" :value="__('Picture')" />
                    <input type="file" class="form-control-file" id="imagem" name="imagem">
                    <x-input-error :messages="$errors->get('imagem')" class="mt-2" />
                </div>

                <div class="flex items-center justify-end my-3">
                    <x-primary-button class="ms-4">
                        {{ __('Register') }}
                    </x-primary-button>
                </div>

            </form>
        </div>
    </div>

</div>
