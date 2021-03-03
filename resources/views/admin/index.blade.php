@extends('layouts/admin-template')

@section('content')
    <div class="container">
        <h1>
            Admin Dashboard
        </h1>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-3">
            <div class="col mb-4">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1593642634315-48f5414c3ad9?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                        alt="some_image" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Check References</h5>
                        <button class="btn btn-info">
                            <a class="text-white" href="/admin/plantreference/">References</a>
                        </button>

                    </div>
                </div>
            </div>

            <div class="col mb-4">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1593642634315-48f5414c3ad9?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                        alt="some_image" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Check Accounts</h5>
                        <button class="btn btn-info">
                            <a class="text-white" href="/admin/account-management">Account Management</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1593642634315-48f5414c3ad9?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                        alt="some_image" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Check Categories</h5>
                        <button class="btn btn-info">
                            <a class="text-white" href="/admin/categories">Categories</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1593642634315-48f5414c3ad9?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                        alt="some_image" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Check Keywords</h5>
                        <button class="btn btn-info">
                            <a class="text-white" href="/admin/keyword">Keywords</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1593642634315-48f5414c3ad9?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                        alt="some_image" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Check Applications</h5>
                        <button class="btn btn-info">
                            <a class="text-white" href="/admin/customer_application/">Pending Applications</a>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col mb-4">
                <div class="card">
                    <img src="https://images.unsplash.com/photo-1593642634315-48f5414c3ad9?ixid=MXwxMjA3fDF8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80"
                        alt="some_image" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Check Articles</h5>
                        <button class="btn btn-info">
                            <a class="text-white" href="/articles">Articles</a>
                        </button>
                    </div>
                </div>
            </div>



        </div>
    @endsection
