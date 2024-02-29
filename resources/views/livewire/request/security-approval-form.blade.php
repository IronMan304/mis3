<div class="modal-content">
    <div class="modal-header">
        <h1 class="modal-title fs-5">
            @if ($requestId)
            Request letter
            @else
            Add Sex
            @endif
            <button type="button" aria-label="Print"><i class="fa-solid fa-print"></i></button>
        </h1>
        <button type="button" class="btn-close btn-sm" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    @if ($errors->any())
    {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    <form wire:submit.prevent="store" enctype="multipart/form-data">
        <div class="modal-body">
            <div class="row">
                {{$request->borrower->first_name ?? ''}}
            </div>
            <div class="modal-footer">



                <div>
                    @if ($request && $request->tool_keys)
                    @php
                    $shownSecurityIds = []; // Initialize an array to keep track of shown security IDs

                    @endphp

                    @if($request->status_id == 16)
                    @foreach ($request->tool_keys as $toolKey)
                    @foreach ($toolKey->rtts_keys as $rtts_key)

                    {{-- Check if the security ID has already been shown --}}
                    @if (!in_array($rtts_key->security->description, $shownSecurityIds))
                    {{-- Check if the status is null and security ID meets the condition --}}
                    @if($rtts_key->status_id == 11 && ($rtts_key->security_id == 3 || $rtts_key->security_id == 5 || $rtts_key->security_id == 6))

                    @if($rtts_key->status_id == 11 && $rtts_key->security_id == 3 && $request->current_security_id == 3)
                    <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="hOOAprroval({{ $request->id }})" title="Approval">
                        <i class="fa-solid fa-thumbs-up"></i>{{ $rtts_key->security->description ?? ''}}
                    </button>
                    <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="hOOReject({{ $request->id }})" title="Reject">
                    <i class="fa-solid fa-thumbs-down"></i>{{ $rtts_key->security->description ?? ''}}
                    </button>
                    @endif

                    @php
                    $shownSecurityIds[] = $rtts_key->security->description;
                    @endphp

                    @endif
                    @endif

                    @endforeach
                    @endforeach
                    @endif
                    @endif
                </div>


                <div>
                    @if ($request && $request->tool_keys)
                    @php
                    $shownSecurityIds = []; // Initialize an array to keep track of shown security IDs

                    @endphp

                    @if($request->status_id == 16)
                    @foreach ($request->tool_keys as $toolKey)
                    @foreach ($toolKey->rtts_keys as $rtts_key)

                    {{-- Check if the security ID has already been shown --}}
                    @if (!in_array($rtts_key->security->description, $shownSecurityIds))
                    {{-- Check if the status is null and security ID meets the condition --}}
                    @if($rtts_key->status_id == 11 && ($rtts_key->security_id == 3 || $rtts_key->security_id == 5 || $rtts_key->security_id == 6))

                    @if($rtts_key->status_id == 11 && $rtts_key->security_id == 5 && $request->current_security_id == 5)
                    <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="vPAprroval({{ $request->id }})" title="Approval">
                        <i class="fa-solid fa-thumbs-up"></i>{{ $rtts_key->security->description ?? ''}}
                    </button>
                    <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="vPReject({{ $request->id }})" title="Reject">
                    <i class="fa-solid fa-thumbs-down"></i>{{ $rtts_key->security->description ?? ''}}
                    </button>
                    @endif

                    @php
                    $shownSecurityIds[] = $rtts_key->security->description;
                    @endphp

                    @endif
                    @endif

                    @endforeach
                    @endforeach
                    @endif
                    @endif
                </div>

                <div>
                    @if ($request && $request->tool_keys)
                    @php
                    $shownSecurityIds = []; // Initialize an array to keep track of shown security IDs

                    @endphp

                    @if($request->status_id == 16)
                    @foreach ($request->tool_keys as $toolKey)
                    @foreach ($toolKey->rtts_keys as $rtts_key)

                    {{-- Check if the security ID has already been shown --}}
                    @if (!in_array($rtts_key->security->description, $shownSecurityIds))
                    {{-- Check if the status is null and security ID meets the condition --}}
                    @if($rtts_key->status_id == 11 && ($rtts_key->security_id == 3 || $rtts_key->security_id == 5 || $rtts_key->security_id == 6))


                    @if($rtts_key->status_id == 11 && $rtts_key->security_id == 6 && $request->current_security_id == 6)
                    <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="pApproval({{ $request->id }})" title="Approval">
                        <i class="fa-solid fa-thumbs-up"></i>{{ $rtts_key->security->description ?? ''}}
                    </button>
                    <button type="button" class="btn btn-primary btn-sm mx-1" wire:click="pReject({{ $request->id }})" title="Reject">
                    <i class="fa-solid fa-thumbs-down"></i>{{ $rtts_key->security->description ?? ''}}
                    </button>
                    @endif


                    @php
                    $shownSecurityIds[] = $rtts_key->security->description;
                    @endphp

                    @endif
                    @endif

                    @endforeach
                    @endforeach
                    @endif
                    @endif
                </div>



       
            </div>
    </form>
</div>