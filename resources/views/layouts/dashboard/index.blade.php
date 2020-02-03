@extends('layouts.dashboard.app')

@section('content')

<div class="content-wrapper">

<section class="content-header">

    <h1>this is dashboard</h1>

    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> @lang('site.dashboard')</a></li>
        <li class="active">@lang('site.users')</li>
    </ol>
</section>

<section class="content">

    <div class="box box-primary">

        <div class="box-header with-border">

            <h3 class="box-title" style="margin-bottom: 15px">@lang('site.users') <small></small></h3>

            <form action="" method="get">

                <div class="row">

                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="@lang('site.search')" value="">
                    </div>

                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> @lang('site.search')</button>
                       
                            <a href="#" class="btn btn-primary"><i class="fa fa-plus"></i> @lang('site.add')</a>
                     
                            <a href="#" class="btn btn-primary disabled"><i class="fa fa-plus"></i> @lang('site.add')</a>
                     
                    </div>

                </div>
            </form><!-- end of form -->

        </div><!-- end of box header -->

        <div class="box-body">

     

                <table class="table table-hover">

                    <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('site.first_name')</th>
                        <th>@lang('site.last_name')</th>
                        <th>@lang('site.email')</th>
                        <th>@lang('site.image')</th>
                        <th>@lang('site.action')</th>
                    </tr>
                    </thead>
                    
                    <tbody>
                    @foreach ($users as $index=>$user)
                        <tr>
                            <td>{{$index + 1 }}</td>
                            <td>{{$user->first_name}}</td>
                            <td>{{$user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td><img src="{{ $user->image_path }}" style="width: 100px;" class="img-thumbnail" alt=""></td>
                            <td>
                              
                                    <a href="#" class="btn btn-info btn-sm"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                              
                                    <a href="#" class="btn btn-info btn-sm disabled"><i class="fa fa-edit"></i> @lang('site.edit')</a>
                            
                                    <form  method="post" style="display: inline-block">
                                       
                                        <button type="submit" class="btn btn-danger delete btn-sm"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                                    </form><!-- end of form -->
                            
                                    <button class="btn btn-danger btn-sm disabled"><i class="fa fa-trash"></i> @lang('site.delete')</button>
                        
                            </td>
                        </tr>
                        @endforeach
              
                    </tbody>

                </table><!-- end of table -->
                
             
                
        
                
                <h2>this is dashboard</h2>
          

        </div><!-- end of box body -->


    </div><!-- end of box -->

</section><!-- end of content -->

</div><!-- end of content wrapper -->

@endsection