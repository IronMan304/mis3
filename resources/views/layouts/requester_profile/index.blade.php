<x-app-layout>
  <div class="content">
    @if(!auth()->user()->hasRole('Patient'))
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
    @endif
    @include('layouts.shared.flash')
    <div class="row">
      <div class="col-sm-12">

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


          <div class="col-lg-8">
            <div class="doctor-personals-grp">

              <div class="card">
                <div class="card-header">
                  <h3>Requests</h3>
                </div>

                <div class="card-body table-dash">
                  <div class="personal-list-out">
                    <div class="row">

                        <div class="table-responsive">
                          <table class="table mb-0 border-0 datatable custom-table patient-profile-table">
                            <thead>
                              <tr>
                                <th>ID</th>
                                <th>Barcode</th>
                                <th>Status</th>
                                <th>Date</th>
                                <th>Action</th>
                              </tr>
                            </thead>
                            <tbody>
                              @foreach($requests as $request)
                              <tr>              
                                <td>{{ $request->id }}</td>
                                <td> 
                              
                                  <span class="text-danger">{{ $request->status->description ?? '' }}</span>
                               
                    
                            
                                </td>
                                <td>{{ $request->created_at->format('m/d/Y') }}</td>
                         

                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                        </div>

                      </div>
                    </div>       
                  </div>
                </div>
              
      

            </div>
          </div>

          
        </div>


      </div>
    </div>
  </div>
@section('custom_script')
@include('layouts.scripts.borrower-scripts')
@endsection
</x-app-layout>