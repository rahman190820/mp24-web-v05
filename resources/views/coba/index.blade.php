<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <form action="{{ route('coba.store')}}" method="post">
                    @csrf
                    <input type="text" name="" id="">
                    <input type="date" name="" id="">
                    <input type="radio" name="" id="">
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                    <input type="submit" value="">
                </form>
            </div>
            <div class="col">
{{--                 
                <form action="{{ route('coba.update') }}" method="post">
                    @csrf
                    @method('put')
                    <input type="text" name="" id="">
                    <input type="date" name="" id="">
                    <input type="radio" name="" id="">
                    <textarea name="" id="" cols="30" rows="10"></textarea>
                    <input type="submit" value="">
                </form>
                 --}}
            </div>
        </div>
    </div>

    <div class="container">
        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse">
                <tr>
                    <th>no</th>
                    <th>nama</th>
                    <th>act</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($collection as $item)
                    <tr>
                        <td scope="row"></td>
                        <td>{{ $item->nama }}</td>
                        <td>
                            <a href="{{ route('coba.show',$item->id) }}">tampil</a>
                            <a href="{{ route('coba.edit',$item->id) }}">edit</a>

                        </td>
                    </tr>
                    @endforeach

                </tbody>
        </table>
    </div>

</body>
</html>