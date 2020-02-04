@extends('layouts.customer')

@section('content')
    <h4 class=" text-center" style="margin-top: 30px;"><b> Choose Your Background</b></h4>
    <div class="row ">
        <div class="col-md-4 ml-5">
            <div class="row justify-content-center">
                <h5 class="pt-1"> <b>Style :</b> </h5>
                <div class="pt-1 ml-2 btn-blue ">
                    <h6 class="pr-2 pl-2 pt-1"><b>Paint Splatter</b> </h6>
                </div>
            </div>
        </div>

    </div>
    <div class="row mt-5">
        <div id="back-slider" class="pl-5 " >
            <!-- The slideshow -->
            <div class="custom-slider">
                @foreach($category->has_backgrounds as $b)
                <div style="margin: 0px 20px; width: 117px;cursor: pointer" class="background-div">
                    <img data-id="{{$b->id}}" src="{{asset($b->image)}}"  alt="Babe Pink">
                </div>
                    @endforeach
            </div>
            <div class="background_title">Colorful Dots</div>

        </div>

    </div>
    <div class="row justify-content-center " >
       <div class="col-md-10  border-bottom-b-1 b-t-1">
           <div class=" p-3" align="center">
               <button class="btn btn-rounded btn-danger p-3 "  data-toggle="modal" data-target="#confirm-background"> Save Background</button>
           </div>
       </div>
    </div>
    <div class="modal fade" id="confirm-background" tabindex="-1" role="dialog" aria-labelledby="add_background" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="row justify-content-center mt-4">
                        <div class="">
                            <h6><b>Are you sure you want to approve the design?</b></h6>
                            <form id="background_save_form" action="{{route('order.save.background')}}" method="POST">
                                @csrf
                                <input type="hidden" name="product" value="{{$product->id}}">
                                <input type="hidden" id="background-category" name="category" value="{{$product->background_id}}">
                            </form>
                        </div>
                    </div>
                    <div class="row justify-content-center ">
                        <div class="mail-buttons">
                            <button class="btn btn-success m-3 set-approved" data-id="{{$product->id}}"  data-target="#review-background" data-dismiss="modal" aria-label="Close"><i class="mdi mdi-check-circle font-bold" ></i> Confirm </button>
                            <button class="btn btn-warning background_save_button m-3" ><i class="mdi mdi-check"></i> No, Just Save The Background</button>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="review-background" tabindex="-1" role="dialog" aria-labelledby="add_background" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-body">

                    <div align="center">
                        <div class="approved_div" >
                            <span class="mdi mdi-check-circle-outline check_mark"></span>
                        </div>
                        <h6 class="text_active"><b>Approved!</b></h6>

                    </div>
                    <div class="mt-2" align="center">
                        <h6><b>Rate Your Designer: </b></h6>
                    </div>
                    <div class="row justify-content-center">
                        <div class='rating-stars '>
                            <ul id='stars' style="margin-bottom: 5px">
                                <li class='star' title='Poor' data-value='1'>
                                    <i class='fa fa-star fa-fw'></i>
                                </li>
                                <li class='star' title='Fair' data-value='2'>
                                    <i class='fa fa-star fa-fw '></i>
                                </li>
                                <li class='star' title='Good' data-value='3'>
                                    <i class='fa fa-star fa-fw '></i>
                                </li>
                                <li class='star' title='Excellent' data-value='4'>
                                    <i class='fa fa-star fa-fw '></i>
                                </li>
                                <li class='star' title='WOW!!!' data-value='5'>
                                    <i class='fa fa-star fa-fw '></i>
                                </li>
                            </ul>

                        </div>
                    </div>
                    <form id="review_form" action="{{route('order.save.review')}}" method="post">
                        @csrf
                        <input type="hidden" name="product" value="{{$product->id}}">
                        <input type="hidden" name="rating" id="rating_input" value="">
                        <div class=" p-3" align="center">
                            <textarea class="form-control" name="review" rows="5"> </textarea>
                        </div>
                    </form>
                        <div class="row justify-content-center">
                            <button  class="btn btn-light close m-2" data-dismiss="modal" aria-label="Close"> No Thanks</button>
                            <button  class="btn btn-primary review-submit m-2"> Submit Review</button>
                        </div>


                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-3">

        <div class="col-md-6" align="center">
            @if($product->has_background != null)
                <img id="design_background" src="{{asset($product->has_background->image)}}">
                @else
                <img id="design_background" src="{{asset('material/background-images/Colorful.jpg')}}">
                @endif

            @if($product->latest_photo == null)
                @if(count(json_decode($product->properties)) > 0)
                    @foreach(json_decode($product->properties) as $property)
                        @if($property->name == '_io_uploads')
                            <img id="design_image" src="{{$property->value}}" >
                        @endif
                    @endforeach
                @endif
            @else
                <img id="design_image" src="{{asset('new_photos/'.$product->latest_photo)}}">
            @endif

        </div>

    </div>

    @endsection
