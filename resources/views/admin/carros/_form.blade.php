<?php  

/* foreach($opcionais_carro as $key => $value) {
    var_dump($value->id_opcional);    
}
exit; */
/* 
    var_dump($opcionais_carro['0']->id_opcional);
    exit;
if(isset($opcionais_carro) == true) {


    var_dump($opcionais_carro->id_opcional);
} else {
    echo 'nada';
} */

/* var_dump($opcionais_carro_id);
exit; */


    /* var_dump($opcionais_carro_id[0]->tituloOpcional); */
/*     foreach($opcionais_carro_id as $key => $value) {
        var_dump($value->tituloOpcional);
    }
exit; */



  /*   if($opcionais_carro_id == 'null'){
        $value = 0;
        $value->id_opcional = 0;
        var_dump($value);
        exit;
    } */

?>

<div class="input-field">
    <input type="text" name="titulo" class="validade" maxlength="60" required value="{{ (isset($registro->titulo) ? $registro->titulo : '') }}">
    <label>Título: </label>
</div>

<div class="input-field">  
    <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="preco" class="validade" maxlength="9" id="preco" required value="{{ (isset($registro->preco) ? $registro->preco : '') }}">
    <label>Preço (Ex: 15000): </label>
    <span class="helper-text" data-error="wrong" data-success="right">Informe o Preço sem Caracteres especiais. Exemplo: 15000</span>
</div>

<div class="input-field">
    <select name="marca_id">
        @foreach($marcas as $marca)
        <option required value="{{ $marca->id }}" {{ (isset($registro->marca_id) && $registro->marca_id == $marca->id ? 'selected' : '') }}>{{ $marca->titulo }}</option>
        @endforeach
    </select>    
    <label>Marca: </label>
</div>

<div class="input-field">
    <select name="modelo_id">
        @foreach($modelos as $modelo)
        <option required value="{{ $modelo->id }}" {{ (isset($registro->modelo_id) && $registro->modelo_id == $modelo->id ? 'selected' : '') }}>{{ $modelo->titulo }}</option>
        @endforeach
    </select>    
    <label>Modelo: </label>
</div>

<div class="input-field">
    <input onkeypress='return event.charCode >= 48 && event.charCode <= 57' type="text" name="ano" class="validade" maxlength="10" required value="{{ (isset($registro->ano) ? $registro->ano : '') }}">
    <label>Ano: </label>
</div>

<div class="input-field">
    <input type="text" name="cor" class="validade" maxlength="20" required value="{{ (isset($registro->cor) ? $registro->cor : '') }}">
    <label>Cor: </label>
</div>

<div class="input-field">
    <input type="text" name="portas" class="validade" maxlength="20" required value="{{ (isset($registro->portas) ? $registro->portas : '') }}">
    <label>Portas: </label>
</div>

<div class="input-field">
    <input type="text" name="quilometragem" class="validade" maxlength="10" required value="{{ (isset($registro->quilometragem) ? $registro->quilometragem : '') }}">
    <label>Quilometragem: </label>
</div>

<div class="input-field">
    <input type="text" name="combustivel" class="validade" maxlength="30" required value="{{ (isset($registro->combustivel) ? $registro->combustivel : '') }}">
    <label>Combustível: </label>
</div>

<div class="input-field">
    <input type="text" name="placa" class="validade" maxlength="10" required value="{{ (isset($registro->placa) ? $registro->placa : '') }}">
    <label>Placa nº Final: </label>
</div>


<div class="input-field">
    <input type="text" name="aceitaTroca" class="validade" maxlength="4" required value="{{ (isset($registro->aceitaTroca) ? $registro->aceitaTroca : '') }}">
    <label>Aceita Trocas: </label>
</div>

<div class="input-field">
    <input type="text" name="unicoDono" class="validade" maxlength="4" required value="{{ (isset($registro->unicoDono) ? $registro->unicoDono : '') }}">
    <label>Único Dono: </label>
</div>

<div class="input-field">
    <input type="text" name="cambio" class="validade" maxlength="15" required value="{{ (isset($registro->cambio) ? $registro->cambio : '') }}">
    <label>Câmbio: </label>
</div>

<div class="input-field">
    <input type="text" name="direcao" class="validade" maxlength="15" required value="{{ (isset($registro->direcao) ? $registro->direcao : '') }}">
    <label>Direção: </label>
</div>

<div class="input-field">
    <input type="text" name="potenciaMotor" class="validade" maxlength="30" required value="{{ (isset($registro->potenciaMotor) ? $registro->potenciaMotor : '') }}">
    <label>Potência do Motor: </label>
</div>

<div class="input-field">    
    <textarea rows="4" cols="50" name="descricao" id="textarea1" class="materialize-textarea" required maxlength="600">{{ (isset($registro->descricao) ? $registro->descricao : '') }}</textarea>
    <label>Descrição: </label>
</div>

<!-- <div class="input-field">    
    <textarea rows="4" cols="50" name="opcionais" id="textarea2" class="materialize-textarea" required maxlength="600">{{ (isset($registro->opcionais) ? $registro->opcionais : '') }}</textarea>
    <label>Opcionais: </label>
</div> -->


<div class="row">    
<!-- @if(isset($opcionais_carro_id)) -->
<?php

    /*foreach($opcionais_carro_id as $value) {
        echo $value;  "
                <div class='col-3'>
                    <p>
                        <label>
                            <input name='opcionais[]' id='opcionais' " . $value . " type='checkbox' class='filled-in' value='" . $value . "' checked />
                            <span>" . $value . "</span>
                        </label>
                    </p>
                </div>
        "; 
    }*/

?>
    
<!-- @endif -->
    @if($opcionais_carro_id == 'null')

    @elseif($opcionais_carro_id)
    @foreach($opcionais_carro_id as $key => $value)    

            <div class="col-3">
                <p>
                    <label>
                        <input name="opcionais[]" id="opcionais{{$value->id_opcional}}" type="checkbox" class="filled-in" value="{{ $value->id_opcional }}" {{ (isset($opcionais_carro_id) ? 'checked' : '') }} />
                        <span>{{ $value->tituloOpcional }}</span>
                    </label>
                </p>
            </div>          

            
        @foreach($opcionais as $opcional)      

            <div class="col-3">
                <p>
                    <label {{ (($value->id_opcional == $opcional->id) ? 'hidden' : '') }}>
                        <input name="opcionais[]" id="opcionais{{$opcional->id}}" type="checkbox" class="filled-in" value="{{ $opcional->id }}"/>
                        <span>{{ $opcional->tituloOpcional }}</span>
                    </label>
                </p>
            </div>        

        @endforeach     
            
    @endforeach
    @endif    
 
</div>

<div class="row">
    <div class="file-field input-field col m6 s12">
        <div class="btn btn1">
        <span>Imagem</span> <i class="material-icons right">image</i>
            <input type="file" name="imagem" >
        </div>        
        <div class="file-path-wrapper">
            <input type="text" class="file-path validade">
            <span class="helper-text" data-error="wrong" data-success="right">Inserir apenas com o Formato Paisagem!</span>
        </div>
    </div>
    <div class="col m6 s12">
        @if(isset($registro->imagem))
            <img width="120" src="{{ asset($registro->imagem) }}">
        @endif
    </div>    
</div>

<div class="input-field col s12">
    <select name="publicar">
        <option value="nao" {{(isset($registro->publicar) && $registro->publicar == 'nao' ? 'selected' : '')}}>Não</option>
        <option value="sim" {{(isset($registro->publicar) && $registro->publicar == 'sim' ? 'selected' :  '')}}>Sim</option>
    </select>    
    <label>Publicar?</label>
</div>

