<div>
    @if( \Session::has('success'))
        <div class="alert-success">

            {{\Session::get('success')}}
        </div>   
    @endif

    @if( \Session::has('error'))
        <div class="alert-danger">

            {{\Session::get('error')}}
        </div>
    @endif

    <br><h3 class="title1">Ingrese los Datos</h3><br>
    <form action="{{ route('category.save')}}" method="post" class="form-inline"  style="justify-content:center; display: flex; width:90%;">
        @csrf 
            <div class="form-group mx-sm-3">
                <label for="inputUser" class="sr-only">Nombre</label>
                <input type="text" class="form-control" id="inputUser" placeholder="Nombre" name="name">
            </div>
        
            <div class="form-group mx-sm-3">
                <label for="inputUser" class="sr-only">Apellido</label>
                <input type="text" class="form-control" id="inputUser" placeholder="Apellido" name="apellido">
            </div>
            
            <div class="form-group mx-sm-3">
                <label for="inputUser" class="sr-only">Edad</label>
                <input type="text" class="form-control" id="inputUser" placeholder="Edad" name="edad">
            </div> <br>

        <button type="submit" class="btn btn-primary" style="margin:20px; color:black;"><b>Aceptar<b></button>
    </form>
</div>


