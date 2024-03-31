<x-app-layout>
  <div class="content">
<style>
  .pagination .page-link {
    padding: 0.25rem 0.5rem; /* Adjust the padding as needed */
    font-size: 0.875rem; /* Adjust the font size as needed */
}
</style>
    <div class="page-header">
      <div class="row">
        <div class="col-sm-12">
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
            <li class="breadcrumb-item"><a href="/requesters">Requester list</a></li>
            <li class="breadcrumb-item"><i class="feather-chevron-right"></i></li>
            <li class="breadcrumb-item">Requester Info</li>
          </ul>
        </div>
      </div>
    </div>

    @include('layouts.shared.flash')
    <div class="row">


      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="doctor-profile-head">

                <div class="row">
                  <div class="col-lg-6 col-xl-4 col-md-4">
                    <div class="p-4">

                      <div class="names-profiles justify-content-left">
                        <h4 class="text-bold">{{ $requester->first_name }}</h4>
                      </div>
                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-lg-4">
          <div class="doctor-personals-grp">
            <div class="card">
              <div class="card-header">
                <div class="heading-detail ">
                  <h3 class="mb-0">Info
                    @hasrole('admin')
                    {{--<a class="btn btn-primary btn-sm mx-1" href="{{ route('requester.edit', $requester->id) }}" title="Edit Information">
                    <i class='fa fa-pen-to-square'></i>
                    </a> --}}
                    @endhasrole
                  </h3>
                </div>
              </div>

              <div class="card-body">

                <div class="about-me-list">
                  <ul class="list-space">
                    <li>
                      <h4>Name</h4>
                      <span>{{ $requester->first_name ?? '' }}</span>
                    </li>

                    <li>
                      <h4>Contact Number</h4>
                      <span>{{ $requester->contact_number ?? '' }}</span>
                    </li>
                    <li>
                      <h4>Gender</h4>
                      <span>{{ $requester->sex->description ?? ''}}</span>
                    </li>


                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>


        <div class="col-lg-12">
          <div class="doctor-personals-grp">

            <div class="card">
              <div class="card-header">
                <h3>Equipment Requests</h3>
              </div>

              <div class="card-body table-dash">
                <div class="personal-list-out">
                  <div class="row">

                    <div class="table-responsive">
                      <table class="table border-0 custom-table comman-table datatable mb-0">
                        <thead>
                          <tr>
                            <th>ID</th>
                            <th>Date Needed</th>
                            <th>Return Date</th>
                            <th>Operator</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @forelse($requests as $request)
                          <tr>
                            <td>{{ $request->id }}</td>
                            <td>
                              {{ $request->date_needed ?? ''}}
                            </td>
                            <td>
                              {{ $request->estimated_return_date ?? ''}}
                            </td>
                            <td>
                              @if ($request->request_operator_keys->isNotEmpty())
                              @foreach ($request->request_operator_keys as $request_operator_key)
                              {{ $request_operator_key->operators->first_name ?? 'n'}} {{ $request_operator_key->operators->last_name ?? ''}} {{ $request_operator_key->status->description ?? ''}} {{--({{ $request_operator_key->toolStatus->description ?? ''}})--}}

                              @if (!$loop->last)
                              {{-- Add a Space or separator between department names --}}
                              <br>
                              @endif
                              @endforeach
                              @elseif ($request->option_id == 1)
                              {{ 'TBA' }}
                              @endif

                              @if ($request->option_id == 2)
                              {{ 'N/A' }}
                              @endif
                            </td>
                            <td>
                              <span class="text-danger">{{ $request->status->description ?? '' }}</span>
                            </td>
                            <!-- <td>{{ $request->created_at->format('m/d/Y') }}</td> -->


                          </tr>
                          @empty
                          <tr>
                            <td colspan="6" class="text-center">No requests found.</td>
                          </tr>
                          @endforelse
                        </tbody>
                      </table>
                    </div>



              



                  </div>
                </div>
              </div>
            </div>
            {{ $requests->links('vendor.pagination.bootstrap-4') }}


          </div>
        </div>



      </div>



    </div>

  </div>
  @section('custom_script')
  @include('layouts.scripts.borrower-scripts')
  @endsection

</x-app-layout>