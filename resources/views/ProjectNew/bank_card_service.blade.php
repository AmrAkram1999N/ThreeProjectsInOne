<x-public-layout>
    <x-slot name="PageName">BT bank service</x-slot>
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
              <h2 class="mb-2 mt-4"><span class="text-danger">{{$account->name}}:</span> Bank_card_Service</h2>
              <div class="table-responsive text-center">
                @if (Session::has('status'))
                <div class="alert alert-warning text-black">
                    {{ Session::get('status') }}
                </div>
            @endif

                <table class="table table-striped custom-table">
                  <thead>
                    <tr>
                        <th scope="col">Order</th>
                        <th scope="col">clientname</th>
                        <th scope="col">clientnumber</th>
                        <th scope="col">Telegram Username</th>
                        <th scope="col">Telegram_Id</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($Cards as $Card)
                    <tr scope="row">
                        <td> {{ $Card->id }} </td>
                        <td> {{ $Card->clientname }} </td>
                        <td> {{ $Card->clientnumber }} </td>
                        <td> {{ $Card->telegramUsername }} </td>
                        <td> {{ $Card->telegram_id }} </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
                <form action="{{ route('Chain.Account.Auth.getClient') }}" method="POST">
                    @csrf
                    <button class="btn btn-sm btn-outline-secondary w-100 font-weight-bold text-black" type="submit" role="button">
                        Get a Client
                    </button>
                </form>
              </div>
            </div>
          </div>
      </div>
    </section>
</x-public-layout>
