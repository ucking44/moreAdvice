<!DOCTYPE html>
<html lang="en">
    <head>
        <title>@yield('title')</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    </head>

    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
              <!-- Brand and toggle get grouped for better mobile display -->
              <div class="navbar-header">

                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>

                <h4>Update Contents For .........</h4>
              </div>

              <!-- Collect the nav links, forms, and other content for toggling -->
              <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                  {{-- <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                  <li><a href="#">Link</a></li> --}}
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">All Contents <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="#">Template, Logo $ Background</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="#">Media Contents</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="#">Banner Contents</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="#">News Contents</a></li>

                      {{-- <li role="separator" class="divider"></li>
                      <li><a href="#">Separated link</a></li>
                      <li role="separator" class="divider"></li>
                      <li><a href="#">One more separated link</a></li> --}}
                    </ul>
                  </li>
                </ul>
                {{-- <form class="navbar-form navbar-left">
                  <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                  </div>
                  <button type="submit" class="btn btn-default">Submit</button>
                </form> --}}
                <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><b>{{ Auth::user()->username }}</b> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                         {{ __('Logout') }}
                     </a>

                     <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                         @csrf
                     </form>
                    </li>
                    </ul>
                  </li>
                </ul>
              </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>


<!------ Include the above in your HEAD tag ---------->
    {{-- @yield('content') --}}
    {{-- @include('navbar') --}}

        <div class="container ">

            <div class="panel-group" id="faqAccordion">

                {{-- ---------------------------------------------- BACKGROUND------------------------------------------  --}}
                <div class="panel panel-default ">
                    <div class="panel-heading accordion-toggle question-toggle collapsed" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question0">
                        <h4 class="panel-title">
                            <li class="nav-link">
                                <a href="#" class="ing">Template, Logo & Background
                                    <i class="nav-icon fas fa-chart-pie"></i>
                                </a>
                            </li>
                    </h4>

                    </div>
                    <div id="question0" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <div class="">
                                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#myModal">Create</button>
                                    </div>
                                    @if($background->count()>0)
                                    <thead class="text-primary">
                                        <th class="w-10p">ID</th>
                                        <th class="w-10p">Name</th>
                                        <th class="w-10p">Edit</th>
                                        <th class="w-10p">Delete</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($background as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#editMyModal{{ $data->id }}" class="btn btn-default">Edit</a>
                                            </td>
                                            <td>
                                                <a href="/delete-background/{{$data->id}}" class="btn btn-danger deletebtn">Delete</a>
                                            </td>
                                        </tr>

                                        {{-- EDIT MODAL  FOR BACKGROUND--}}

                                        <div id="editMyModal{{ $data->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Modal Header</h4>
                                                </div>
                                                <form action="/update-background/{{$data->id}}" method="post">
                                                    @method("PATCH")
                                                    @csrf

                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                                        <input type="text" name="name" class="form-control" id="recipient-name" value="{{ $data->name }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        @else
                                             <h4 class="text-center text-danger">No Record Found</h4>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- ------------------------------ MEDIA CONTENT -----------------------------    --}}
                <div class="panel panel-default ">
                    <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question1">
                        <h4 class="panel-title">
                            <li class="nav-link">
                                <a href="#" class="ing">Media Content
                                    <i class="ion-social-pinterest"></i>
                                </a>
                            </li>
                        </h4>

                    </div>
                    <div id="question1" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <div class="">
                                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#amyModal">Create</button>
                                    </div>
                                    @if($media->count()>0)
                                    <thead class="text-primary">
                                        <th class="w-10p">ID</th>
                                        <th class="w-10p">Name</th>
                                        <th class="w-10p">Title</th>
                                        <th class="w-10p">Description</th>
                                        <th class="w-10p">Media</th>
                                        <th class="w-10p">Edit</th>
                                        <th class="w-10p">Delete</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($media as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>{{ $data->title }}</td>
                                            <td>
                                                <div style="height:60px; overflow: hidden;">
                                                {{ $data->description }}
                                                </div>
                                            </td>
                                            <td>
                                                <div style="height:60px; overflow: hidden;">
                                                <img src="album_covers/{{ $data->media }}" width="100">
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#editModal{{ $data->id }}" class="btn btn-default">Edit</a>
                                            </td>
                                            <td>
                                                <a href="/delete-media/{{$data->id}}" class="btn btn-danger deletebtn">Delete</a>
                                            </td>
                                        </tr>

                                        {{-- EDIT MODAL FOR MEDIA--}}

                                        <div id="editModal{{ $data->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Modal Header</h4>
                                                </div>
                                                <form action="/update-media/{{$data->id}}" method="post">
                                                    @method("PATCH")
                                                    @csrf

                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Name:</label>
                                                            <input type="text" name="name" class="form-control" id="recipient-name" value="{{ $data->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="title" class="col-form-label">Title:</label>
                                                            <input type="text" name="title" class="form-control" id="title" value="{{ $data->title }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="description" class="col-form-label">Description:</label>
                                                            <input type="text" name="description" class="form-control" id="description" value="{{ $data->description }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        @else
                                             <h4 class="text-center text-danger">No Record Found</h4>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                {{-- --------------------------------------------BANNER CONTENT ------------------------------------ --}}
                <div class="panel panel-default ">
                    <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question2">
                        <h4 class="panel-title">
                            <li class="nav-link">
                                <a href="#" class="ing">Banner Content
                                    {{-- <i class="ion-eye"></i> --}}
                                    <i class="now-ui-icons education_atom"></i>
                                </a>
                            </li>
                        </h4>

                    </div>
                    <div id="question2" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <div class="">
                                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#bannerModal">Create</button>
                                    </div>
                                    @if($banner->count()>0)
                                    <thead class="text-primary">
                                        <th class="w-10p">ID</th>
                                        <th class="w-10p">Name</th>
                                        <th class="w-10p">Logo</th>
                                        <th class="w-10p">Schedule</th>
                                        <th class="w-10p">Edit</th>
                                        <th class="w-10p">Delete</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($banner as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->name }}</td>
                                            <td>
                                                <div style="height:60px; overflow: hidden;">
                                                <img src="logos/{{ $data->logo }}" width="100">
                                                </div>
                                            </td>
                                            <td>{{ $data->schedule }}</td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#editingModal{{ $data->id }}" class="btn btn-default">Edit</a>
                                            </td>
                                            <td>
                                                <a href="/delete-banner/{{$data->id}}" class="btn btn-danger deletebtn">Delete</a>
                                            </td>
                                        </tr>

                                        {{-- EDIT MODAL FOR BANNER--}}

                                        <div id="editingModal{{ $data->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Modal Header</h4>
                                                </div>
                                                <form action="/update-banner/{{$data->id}}" method="post">
                                                    @method("PATCH")
                                                    @csrf

                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="recipient-name" class="col-form-label">Name:</label>
                                                            <input type="text" name="name" class="form-control" id="recipient-name" value="{{ $data->name }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="schedule" class="col-form-label">Schedule:</label>
                                                            <input type="date" name="schedule" class="form-control" id="schedule" value="{{ $data->schedule }}">
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        @else
                                             <h4 class="text-center text-danger">No Record Found</h4>
                                        @endif
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>


                {{-- -------------------------------------------- NEWS CONTENT -------------------------------------- --}}
                <div class="panel panel-default ">
                    <div class="panel-heading accordion-toggle collapsed question-toggle" data-toggle="collapse" data-parent="#faqAccordion" data-target="#question3">
                        <h4 class="panel-title">
                            <li class="nav-link">
                                <a href="#" class="ing">News Content
                                    <i class="ion-chatbubble"></i>
                                </a>
                            </li>
                    </h4>

                    </div>
                    <div id="question3" class="panel-collapse collapse" style="height: 0px;">
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-striped">
                                    <div class="">
                                        <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#newsModal">Create</button>
                                    </div>
                                    @if($news->count()>0)
                                    <thead class="text-primary">
                                        <th class="w-10p">ID</th>
                                        <th class="w-10p">Category</th>
                                        <th class="w-10p">Content</th>
                                        <th class="w-10p">Edit</th>
                                        <th class="w-10p">Delete</th>
                                    </thead>
                                    <tbody>

                                        @foreach ($news as $data)
                                        <tr>
                                            <td>{{ $data->id }}</td>
                                            <td>{{ $data->category }}</td>
                                            <td>
                                                <div style="height:60px; overflow: hidden;">
                                                {{ $data->content }}
                                                </div>
                                            </td>
                                            <td>
                                                <a href="#" data-toggle="modal" data-target="#myeditModal{{ $data->id }}" class="btn btn-default">Edit</a>
                                            </td>
                                            <td>
                                                <a href="/delete-news/{{$data->id}}" class="btn btn-danger deletebtn">Delete</a>
                                            </td>
                                        </tr>

                                        {{-- EDIT MODAL FOR NEWS--}}

                                        <div id="myeditModal{{ $data->id }}" class="modal fade" role="dialog">
                                            <div class="modal-dialog">

                                            <!-- Modal content-->
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                    <h4 class="modal-title">Modal Header</h4>
                                                </div>
                                                <form action="/update-news/{{$data->id}}" method="post">
                                                    @method("PATCH")
                                                    @csrf

                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="category" class="col-form-label">Category:</label>
                                                            <input type="text" name="category" class="form-control" id="category" value="{{ $data->category }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="content" class="col-form-label">Content:</label>
                                                            <textarea name="content" rows="2" class="text-area-messge form-control" id="content" placeholder="Enter your Content" aria-required="true" aria-invalid="false">{{ $data->content }}</textarea >
                                                            {{-- <input type="text" name="content" class="form-control" id="content" value="{{ $data->content }}"> --}}
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="submit" class="btn btn-primary">Update</button>
                                                    </div>
                                                </form>
                                            </div>
                                            </div>
                                        </div>
                                        @endforeach

                                        @else
                                             <h4 class="text-center text-danger">No Record Found</h4>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                 <!------------------------------------------------------- MODAL BACKGROUND CONTENT ------------------------------------------------------>
                    <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            <form action="/save-background" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                    <label for="recipient-name" class="col-form-label">Name:</label>
                                    <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Enter Name">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>

                    {{--------------------------------------------------- MODAL FOR MEDIA CONTENT ------------------------------------------------------}}
                    <div id="amyModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            <form action="/save-media" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                        <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Enter Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title">
                                    </div>

                                    <div class="form-group">
                                        <label for="description">Description</label>
                                        <input type="text" class="form-control" name="description" id="description" placeholder="Enter Description">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Select Media</label>
                                        <input type="file" name="media">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>

                    {{--------------------------------------------------- MODAL FOR BANNER CONTENT ------------------------------------------------------}}
                    <div id="bannerModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            <form action="/save-banner" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="recipient-name" class="col-form-label">Name:</label>
                                        <input type="text" name="name" class="form-control" id="recipient-name" placeholder="Enter Name">
                                    </div>

                                    <div class="form-group">
                                        <label class="form-label">Logo</label>
                                        {{-- <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title"> --}}
                                        <input type="file" name="logo">
                                    </div>

                                    <div class="form-group">
                                        <label for="schedule">Schedule</label>
                                        <input type="date" class="form-control" name="schedule" id="schedule" placeholder="Enter Schedule">
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>

                    {{--------------------------------------------------- MODAL FOR NEWS CONTENT ------------------------------------------------------}}
                    <div id="newsModal" class="modal fade" role="dialog">
                        <div class="modal-dialog">

                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Modal Header</h4>
                            </div>
                            <form action="/save-news" method="post">
                                @csrf

                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="category" class="col-form-label">Category:</label>
                                        <input type="text" name="category" class="form-control" id="category" placeholder="Enter Category">
                                    </div>

                                    <div class="form-group">
                                        <label for="content">Content</label>
                                        <textarea name="content" rows="5" class="text-area-messge form-control" id="content" placeholder="Enter your Content" aria-required="true" aria-invalid="false"></textarea >
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </form>
                        </div>
                        </div>
                    </div>

            </div>
            <!--/panel-group-->
        </div>
        </body>
</html>


