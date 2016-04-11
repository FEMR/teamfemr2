@extends('layouts.appFemr')

@section('content')


                <div class="panel-heading"><center><h1>Literature Bank</h1></center></div>
                  <div class="panel-body">
                    <!--Link to Literature Bank Survey-->
                      <div><a href ="/litbanksurvey/create" class="btn btn-danger btn-sm">ADD RESOURCE</a>
                          <hr>
                      </div>
                      {{--<h2><a href="litbanksurvey/create">Click here to add a resource</a></h2>--}}


                                <!--Portion of web page where the links to resources are listed-->

                    <h3>New Additions:</h3>
                    <div class="row">
                        @foreach( $literatures as $id => $literature )
                            @if($id%2 == 1)
                                <div class="row">
                                    @endif
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <a href="<?php echo $info[$id]->url ?>"><?php echo $info[$id]->title ?></a>
                                </div>
                                 <br>
                                 <?php echo $info[$id]->description ?>
                                 <br>

                                 <a class="img-responsive center-block" href="<?php echo $info[$id]->url ?>"><img src="<?php echo $info[$id]->image ?>" alt="Main image" style="width:200px;height:150px;"></a>
                                 <br>
                                 <?php echo $info[$id]->publishedDate ?>
                                 @if($literature->fileName)
                                      <h4><a href= {{$literature->fileName}}>Download Related Content</a></h4>
                                 @endif
                                @if($id%2 == 1)
                            </div>
                            @endif
                            </div>
                        </div>

                        @endforeach
                    </div>
                  </div>
                </div>


@endsection

