<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Dev - Paginate with Filters</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <div class="container">
        <div>
            <h3>Clients</h3>
            <p>List of Clients</p>

            <button type="button" class="btn btn-primary">New Client</button>
            <a href="{{route('client.index')}}" ><button type="button" class="btn btn-success">Refresh</button></a>
            <button type="button" data-toggle="collapse" data-target="#demo" class="btn btn-primary">Filter</button>
            
            <div id="demo" class="collapse">
                {{-- SEARCH FORM --}}
                <form method="POST" action="{{route('client.index')}}">
                    @csrf
                    <div class="card-body">
                        <h4>Filter Options:</h4>
                    </div>
                    <div class="form-group row">
                        <label for="inputSearch" class="col-sm-2 col-form-label">Search</label>
                        <div class="col-sm-10">
                        <input type="text" name="filter_client[search]" class="form-control" id="inputSearch" placeholder="Find by Name, Email or Address" value="{{session()->get('filter_client[search]')}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputStatus" class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" id="inputStatus" name="filter_client[status]">
                                <option>Select...</option>
                                <option value="1" @if(session()->get('filter_client[status]') == 1) selected @endif>Active</option>
                                <option value="0" @if(!is_null(session()->get('filter_client[status]')) && session()->get('filter_client[status]') == 0) selected @endif>Inactive</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" style="float:right;">
                        <div class="col-sm-12">
                            <input type="hidden" name="filter_client[enable]" value="true"/>
                            <a href="{{route('client.clear.filter')}}"><button type="button" class="btn btn-info">Clear Filter</button></a>
                            <button type="button" data-toggle="collapse" data-target="#demo" class="btn btn-warning">Cancel</button>
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <div>
            <table class="table table-hover">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                  </tr>
                </thead>
                <tbody>                 
                    @foreach ($records as $record)
                        <tr scope="row">
                            <td>{{ $record->id }}</td>
                            <td>{{ $record->name }}</td>
                            <td>{{ $record->email }}</td>
                            <td>{{ $record->address }}</td>
                            <td>{{ $record->status }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="mt-10">
            {{$records->links()}}
            @if($records->total() == 0)
                No records found!
            @elseif($records->total() == 1)
                {{$records->total()}} Record found!
            @else
                {{$records->total()}} Records found!
            @endif
        </div>

    </div>
    <!-- Copyright -->
    <div class="text-center p-4 mt-100" style="background-color: rgba(0, 0, 0, 0.05);">
        LaravelDev
        <a class="text-reset fw-bold" href="https://www.youtube.com/channel/UCfi8x9g7nvRXVCUYlPEiSjg">Franklin Amaral</a>
    </div>
    <!-- Copyright -->
</body>
</html>