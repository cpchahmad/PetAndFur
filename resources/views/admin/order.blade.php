@extends('layouts.admin')
@section('content')
    <div class="row page-titles">
        <div class="col-md-5 col-8 align-self-center">
            <h3><strong>Orders</strong></h3>

        </div>

    </div>

    <div class="row">
        <div class="col-md-12 pr-0  ">
            <div class="row p-0 m-2  "  >
                <div class=" col-md-5 col-sm-6 bg-white">
                    <div class="row">
                        <div class="col-md-1 col-sm-3 pr-1 pt-2">
                            <i class="ti-search "></i>
                        </div>
                        <div class="col-md-11 col-sm-9 pl-0">
                            <input type="text" class="border-0 form-control filter-search" data-route="{{route('admin.orders.filter')}}" autocomplete="false"  name="search" placeholder="Filter Orders By ID, Name, Email" required>

                        </div>
                    </div>
                </div>
                <div class="col-md-7 col-sm-6 bg-white">
                    <div class="row justify-content-end" >
                        <div class=" dropdowns">
                            <div class="dropdown">
                                <button class="btn btn-secondary order_status_button dropdown-toggle" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Status
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item order_status">All Orders</a>
                                    @foreach($statuses as $s)
                                        <a class="dropdown-item order_status">{{$s->name}}</a>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class=" dropdowns">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="pr-4 designer-text">Designer</span>
                                </button>
                                <div class="dropdown-menu " aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item change_designer">All Designers</a>
                                    @foreach($designers as $d)
                                        <a class="dropdown-item change_designer" >{{$d->name}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class=" dropdowns">
                            <div class="dropdown">
                                <button class="btn btn-secondary dropdown-toggle" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="pr-5 product-filter-button">Product</span>
                                </button>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item change_product" data-route="{{route('admin.orders.filter')}}">All Products</a>
                                    @foreach($products as $product)
                                        <a class="dropdown-item change_product" data-route="{{route('admin.orders.filter')}}">{{$product->title}}</a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-warning " href="{{route('admin.orders')}}">Remove Filters</a>

                    </div>

                </div>

            </div>

        </div>



    </div>
    <div class="row">
        <div class="col-md-2 pl-0">
            <div class="flexing">
                <div class=" dropdowns actionbox">
                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle" type="button" id="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="pr-5">Actions</span>
                        </button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" >Completed</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="orders">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="table-responsive">
                        <table class="table v-middle" id="order_table">
                            <thead>
                            <tr class="bg-light ">
                                <th >
                                    <div class="checkbox">
                                        <input type="checkbox" class="" id="check-all">
                                        <label for="check-all" class="check-all"></label>

                                    </div>
                                </th>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0 " >Date</th>
                                <th class="border-top-0">Email</th>
                                <th class="border-top-0">Send Email</th>
                                <th class="border-top-0" >Last Email</th>
                                <th class="border-top-0">Designer</th>
                                <th class="border-top-0">Design Status</th>
                                <th class="border-top-0">Details</th>
                                <th class="border-top-0">Order Status</th>
                            </tr>

                            </thead>
                            <tbody id="myTable">
                            @foreach($orders as $order)
                                <tr>
                                    <td>
                                        <div class="checkbox">
                                            <input type="checkbox" class="checkSingle" id="check-1" >
                                            <label for="check-1"></label>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{route('order.detail', $order->id)}}">{{ $order->name }}</a>
                                    </td>
                                    <td>2020-01-10</td>
                                    <td>{{ $order->email }}</td>
                                    <td>
                                        <div class="button-group">
                                            <a href="" class="btn waves-effect waves-light btn-rounded btn-xs btn-info send_email">
                                                Send
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        2020-01-20
                                    </td>
                                    <td>
                                        @if($order->has_designer != null)
                                            <span class="badge badge-pill designer" style="color: {{$order->has_designer->color}}; background: {{$order->has_designer->background_color}}">{{$order->has_designer->name}} </span>
                                        @endif
                                    </td>
                                    <td align="center">
                                        @if($order->has_design_details != null)
                                            @if($order->has_design_details->status_id == 4)
                                                <div class="setting_div">
                                                    <span class="mdi mdi-settings text-white display-6"></span>
                                                </div>
                                                <h6 class="text-dark"><b>{{$order->has_design_details->status}}</b></h6>
                                            @elseif($order->has_design_details->status_id == 7)
                                                <div class="approved_div">
                                                    <span class="mdi mdi-check-circle-outline check_mark"></span>
                                                </div>
                                                <h6 class="text_active"><b>{{$order->has_design_details->status}}</b></h6>
                                            @elseif($order->has_design_details->status_id == 9)
                                                <div class="cir">
                                                    <span class="rec"></span>
                                                </div>
                                                <h6 class="not_completed"><b>{{$order->has_design_details->status}}</b></h6>
                                            @elseif($order->has_design_details->status_id == 8)
                                                <div class="update_div">
                                                    <span class="update_icon">!</span>
                                                </div>
                                                <h6 class="updating"><b>{{$order->has_design_details->status}}</b></h6>
                                            @endif

                                        @else
                                            <div class="cir">
                                                <span class="rec"></span>
                                            </div>
                                            <h6 class="not_completed"><b>No Design</b></h6>
                                        @endif

                                    </td>

                                    <td align="center">
                                        <div>
                                            <span class="mdi mdi-camera photo"></span>
                                        </div>
                                        <h6 class="photo_text"><b>NEW PHOTO</b></h6>
                                    </td>
                                    @if($order->has_additional_details != null)
                                    <input type="hidden" class="order-status-value" value="{{$order->has_additional_details->status}}">
                                    @endif
                                    <td class="order-status-td" style="background: #0066CC;color:#ffff">
                                        <div class="dropdown">
                                            <span style="cursor: pointer" class="pr-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">New </span>

                                            <div  class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                                @foreach($statuses as $s)
                                                        <a class="dropdown-item text-primary change_status" data-id="{{$order->id}}" data-route="{{route('admin.orders.change_status')}}" data-method="GET" data-status-id="{{$s->id}}">{{$s->name}}</a>
                                                @endforeach


                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="text-center">
                        {{ $orders->links() }}
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
