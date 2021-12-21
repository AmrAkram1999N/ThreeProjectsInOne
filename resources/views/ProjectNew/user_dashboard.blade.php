<x-public-layout>
    <x-slot name="PageName">BT user dashboard</x-slot>
    <!-- ======= Breadcrumbs ======= -->
    {{-- <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2></h2>
          <ol>
            <li><a href="index.html"></a></li>
            <li></li>
          </ol>
        </div>

      </div>
    </section> --}}
    <!-- End Breadcrumbs -->

    <section class="inner-page ">
      <div class="container ">

        <div class="content">

            <div class="container">
              <h2 class="mb-2 mt-4">Accounts Services</h2>

              <div class="table-responsive text-center">
                @if (Session::has('warning'))
                <div class="alert alert-warning text-black">
                    {{ Session::get('warning') }}
                </div>
                @endif
                <table class="table table-striped custom-table">
                  <thead>
                    <tr>
                      <th scope="col">Order</th>
                      <th scope="col">Name_Service</th>
                      <th scope="col">Username</th>
                      <th scope="col">Name_Employee</th>
                      <th scope="col">Phone_Number</th>
                      <th scope="col">Show_Service</th>
                      <th scope="col">Deleting</th>
                      <th scope="col"></th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($Services as $Service)
                    <tr scope="row">
                        <td>{{ $Service->id }}</td>
                        <td>{{ $Service->name_service }}</td>
                        <td>{{ $Service->username }}</td>
                        <td>{{ $Service->name_employee }}</td>
                        <td>@if($Service->phone_number == null)-- @endif {{ $Service->phone_number }}</td>
                        <td><a target="_blank" class="btn btn-sm btn-outline-secondary text-success"
                            href="{{ route('Chain.Account.Auth.accountDashboard') }}">Show</a></td>
                            <td><a class="btn btn-sm btn-outline-secondary text-danger"
                            href="{{ route('Chain.User.Auth.Delete_Service', $Service->username) }}">Delete</a></td>
                        <td></td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <x-buyMore></x-buyMore>
              </div>


            </div>

          </div>
      </div>
    </section>
</x-public-layout>
