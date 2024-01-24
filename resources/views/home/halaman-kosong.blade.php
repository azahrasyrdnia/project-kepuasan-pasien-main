<!doctype html>
<html lang="en">
@extends('template.main')

@section('title-front', 'AKSI RSQ | Home')

@section('content-front')
    <div class="row text-center d-flex justify-content-center">
        <div class="col mt-3">
            @if (session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif

        </div>
    </div>
@endsection
