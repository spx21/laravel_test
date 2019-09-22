@extends('layouts.app')

@section('content')
<div class="container" ng-controller="OrderController">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <button class="btn btn-primary btn-xs pull-right" ng-click="toggle('add', 0)">Add Order</button>
                        Orders
                    </div>
 
                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
 
 
                        <table class="table table-bordered table-striped" ng-if="products.length > 0">
                            <tr>
                                <th>No.</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th width="200px">Action</th>
                            </tr>
                            <tr ng-repeat="(index, product) in products">
                                <td>
                                    @{{ index + 1 }}
                                </td>
                                <td>@{{ product.Title }}</td>
                                <td>@{{ product.Description }}</td>
                                <td>
                                    <button class="btn btn-success btn-xs" ng-click="toggle('edit', product.id)">Edit</button>
                                    <button class="btn btn-danger btn-xs" ng-click="confirmDelete(product.id)" >Delete</button>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div  class="modal" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">@{{modal_title}}</h4>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" name="title" class="form-control" ng-model="product.Title">
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" rows="5" class="form-control"
                                      ng-model="product.Description"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" name="category" class="form-control" ng-model="product.Category">
                        </div>
                        <div class="form-group">
                            <label for="subcategory">Sub-Category</label>
                            <input type="text" name="subcategory" class="form-control" ng-model="product.SubCategory">
                        </div>
                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" name="price" class="form-control" ng-model="product.Price">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" name="quantity" class="form-control" ng-model="product.Quantity">
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" ng-click="save('create',0)">Submit</button>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>

    
@endsection
