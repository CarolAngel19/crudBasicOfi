<div><br>
    <table class="table">
        <thead>
			<tr>
				<th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Edad</th>
				<th scope="col">Acciones</th>
			</tr>
        </thead>

        <tbody>
            @foreach($categories as $category)
            <tr>
                <td>
                    {{ $category->id }} 
                </td>
                <td>
                    {{ $category->name }} 
                </td>
                <td>
                    {{$category->apellido}}
                </td>

                <td>
                    {{$category->edad}}
                </td>

                <td>
                    <div>
                        <form action="{{route('category.update', ['category' => $category->id])}}" method="post" >
                            @csrf
                            
                                <input type="text" name="name" placeholder="Nombre" class="text1" ><br>
                
                            
                                <input type="text" name="apellido" placeholder="Apellido" class="text1"><br>
                
                            
                                <input type="text" name="edad" placeholder="Edad" class="text1"><br>
                                            
                            <button type="submit" class="button1"><b>Actualizar</b></button>

                            <form action="{{route('category.delete', ['category' => $category->id])}}" method="post">
                                @csrf
                                <button type="submit" class="button2"><b>Eliminar</b></button>
                            </form>
                        </form>
                    </div>
                </td>
            </tr>  
            @endforeach              
        </tbody>
    </table>
</div>


