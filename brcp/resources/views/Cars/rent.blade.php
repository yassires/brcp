@extends('layouts.master')

@section('content')
    
<div class="tb shadow-lg">
    <div class="row m-0">
      <div class="col-lg-7 pb-5 pe-lg-5">
        <div class="row">
          <div class="col-12 p-5">
            <img class="img" src="img/tesla_model_s.webp" alt="" />
          </div>
          <div class="row m-0 bg-light">
            <div class="col-md-4 col-6 ps-30 pe-0 my-4">
              <p class="text-muted">Brand</p>
              <p class="h5">Tesla</p>
            </div>
            <div class="col-md-4 col-6 ps-30 my-4">
              <p class="text-muted">Model</p>
              <p class="h5 m-0">Model S Plaid</p>
            </div>
            <div class="col-md-4 col-6 ps-30 my-4">
              <p class="text-muted">Category</p>
              <p class="h5 m-0">Electric</p>
            </div>
            <div class="col-md-4 col-6 ps-30 my-4">
              <p class="text-muted">Color</p>
              <p class="h5 m-0">White</p>
            </div>
            <div class="col-md-4 col-6 ps-30 my-4">
              <p class="text-muted">Availability</p>
              <p class="h5 m-0">Availabale</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-5 p-0 ps-lg-4">
        <div class="row m-0">
          <div class="col-12 px-4">
            <div class="d-flex align-items-end mt-4 mb-2">
              <p class="h4 m-0"><span class="pe-1">Buy</span></p>
            </div>
            <div class="d-flex justify-content-between mb-3">
              <p class="textmuted fw-bold">Price</p>
              <div class="d-flex align-text-top"><span class="fas fa-dollar-sign mt-1 pe-1 fs-14"></span><span class="h4">75000</span></div>
            </div>
          </div>
          <div class="col-12 px-0">
            <div class="row bg-light m-0">
              <div class="col-12 px-4 my-4">
                <p class="fw-bold">Your Information</p>
              </div>
              <div class="col-12 px-4">
                <div class="d-flex mb-4">
                  <span class="pe-5">
                    <p class="text-muted">Email</p>
                    <input class="form-control" type="email" placeholder="Something@test.com" />
                  </span>
                  <span class="me-5">
                    <p class="text-muted">Name</p>
                    <input class="form-control" type="text" placeholder="Name" />
                  </span>
                </div>
              </div>
            </div>
            <div class="row m-0">
              <div class="col-12 mb-4 p-0">
                <div class="btn btn-primary">Buy<span class="fas fa-arrow-right ps-2"></span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <style>
    @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@500&family=Work+Sans:wght@800&display=swap");

    * {
      padding: 0;
      margin: 0;
      box-sizing: border-box;
    }

    body {
      padding: 5px;
      /* background-color: gray; */
    }

    .tb {
      /* margin: 20px auto; */
      /* max-width: 1000px; */
      background-color: white;
      padding: 0;
      min-height: 100vh;
    }

    .form-control {
      height: 25px;
      width: 150px;
      border: none;
      border-radius: 0;
      font-weight: 800;
      padding: 0 0 5px 0;
      background-color: transparent;
      box-shadow: none;
      outline: none;
      border-bottom: 2px solid #ccc;
      margin: 0;
      font-size: 14px;
    }

    .form-control:focus {
      box-shadow: none;
      border-bottom: 2px solid #ccc;
      background-color: transparent;
    }

    .form-control2 {
      font-size: 14px;
      height: 20px;
      width: 55px;
      border: none;
      border-radius: 0;
      font-weight: 800;
      padding: 0 0 5px 0;
      background-color: transparent;
      box-shadow: none;
      outline: none;
      border-bottom: 2px solid #ccc;
      margin: 0;
    }

    .form-control2:focus {
      box-shadow: none;
      border-bottom: 2px solid #ccc;
      background-color: transparent;
    }

    .form-control3 {
      font-size: 14px;
      height: 20px;
      width: 30px;
      border: none;
      border-radius: 0;
      font-weight: 800;
      padding: 0 0 5px 0;
      background-color: transparent;
      box-shadow: none;
      outline: none;
      border-bottom: 2px solid #ccc;
      margin: 0;
    }

    .form-control3:focus {
      box-shadow: none;
      border-bottom: 2px solid #ccc;
      background-color: transparent;
    }

    p {
      margin: 0;
    }

    .img {
      width: 100%;
      height: 100%;
      object-fit: fill;
    }

    .text-muted {
      font-size: 10px;
    }

    .textmuted {
      color: #6c757d;
      font-size: 13px;
    }

    .fs-14 {
      font-size: 14px;
    }

    .btn.btn-primary {
      width: 100%;
      height: 55px;
      border-radius: 0;
      padding: 13px 0;
      background-color: black;
      border: none;
      font-weight: 600;
    }
    .btn.btn-secondary {
      width: 100%;
      height: 55px;
      border-radius: 0;
      padding: 13px 0;
      background-color: #f15a59;
      border: none;
      font-weight: 600;
    }

    .btn.btn.btn-secondary:hover .fas {
      transform: translateX(10px);
      transition: transform 0.5s ease;
    }
    .btn.btn-primary:hover .fas {
      transform: translateX(10px);
      transition: transform 0.5s ease;
    }

    .fw-900 {
      font-weight: 900;
    }

    ::placeholder {
      font-size: 12px;
    }

    .ps-30 {
      padding-left: 30px;
    }

    .h4 {
      font-family: "Work Sans", sans-serif !important;
      font-weight: 800 !important;
    }

    .textmuted,
    h5,
    .text-muted {
      font-family: "Poppins", sans-serif;
    }
</style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
@endsection