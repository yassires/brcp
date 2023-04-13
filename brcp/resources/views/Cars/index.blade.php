<x-dash>
    <div class="row my-4">
        <div class="col-md-4">
            <div class="card bg-light border border-primary">
                <h3 class="card-header">
                    Search
                </h3>
                <div class="card-body">
                    <form action="{{route('cars.index')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="Search">Search</label>
                            <input type="text" name="search" id="" class="form-control my-2" placeholder="Search...">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border border-primary">
                <h3 class="card-header">{{$title}}</h3>
                <div class="card-body">
                    @foreach ($cars as $car)
                        <div class="media mb-2">
                            <div class="media-content">
                                <img src="{{$car->image}}" class="img-fluid rounded-cercle" alt="" width="200px">
                                
                            </div>
                            <div class="madia-body">
                                <h3 class="text-info">
                                    <a href="{{route('cars.show',$car->id)}}" class="btn">
                                        {{$car->name}} | {{$car->Brand->name}}
                                    </a>
                                </h3>
                                <p class="d-flex flex-row justify-content-center align-items-center">
                                    <span class="badge bg-danger mx-1">category: {{$car->Category->name}}</span>
                                    <span class="badge bg-primary mx-1">Price for Sell: {{$car->price_sell}} $</span>
                                    <span class="badge bg-primary mx-2">Price for Rent: {{$car->price_rent}} $</span>
                                    @if ($car->available)
                                        <span class="badge bg-success ">
                                        Available
                                        </span>  
                                    @else
                                        <span class="badge bg-warning ">
                                            Reserved
                                        </span>  
                                    @endif
                                    
                                </p>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
                <div class="d-flex justify-content-center">
                    {!! $cars->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-dash>