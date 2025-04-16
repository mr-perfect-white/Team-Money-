@extends('admin.layouts.app')
@section('title') Registration Form @endsection
@section('style')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
@endsection

@section('content')

<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-sm-6">
                <h3>Group Info</h3>
            </div>
            <div class="col-12 col-sm-6">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"> <i data-feather="home"></i></a></li>
                    <li class="breadcrumb-item">Group</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<!-- Group form start-->
<div class="card">
    <div class="card-body">
    <form id="groupForm" class="needs-validation" action="{{route('group.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label" for="groupName">Group Name</label>
            <input class="form-control" id="groupName" name="name" type="text" placeholder="Enter Group Name" required>
            <div class="invalid-feedback">Please enter a group name.</div>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label" for="groupLogo">Group Logo</label>
            <input class="form-control" id="groupLogo" type="file" name="logo" accept="image/*" required>
            <div class="invalid-feedback">Please upload a logo.</div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label" for="members">Members</label>
            <select class="form-select" id="members" name="members[]">
                @foreach($members as $member)
                    <option value="{{$member->id}}">{{$member->FullName}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please select one option.</div>
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label" for="roles">Roles</label>
            <select class="form-select" id="roles" name="roles[]">
                @foreach($memberroles as $memberrole)
                    <option value="{{$memberrole->id}}">{{$memberrole->name}}</option>
                @endforeach
            </select>
            <div class="invalid-feedback">Please select one option.</div>
        </div>
    </div>

    <button type="button" id="addMemberBtn" class="btn btn-primary">Add Member</button>

    <table class="table mt-3" id="membersTable">
        <thead>
            <tr>
                <th>Member</th>
                <th>Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
          
        </tbody>
    </table>

    <!-- Hidden fields will be added dynamically here -->
    
    <button class="btn btn-primary" type="submit">Submit</button>
</form>






    </div>
</div>

@endsection

@section("script")
<script>
    document.addEventListener("DOMContentLoaded", function () {
    const membersSelect = document.getElementById("members");
    const rolesSelect = document.getElementById("roles");
    const addMemberBtn = document.getElementById("addMemberBtn");
    const membersTableBody = document.getElementById("membersTable").getElementsByTagName('tbody')[0];
    
    // Store added members in an array
    let selectedMembers = [];

    // Add member to the table
    addMemberBtn.addEventListener("click", function () {
        const member = membersSelect.value;
        const role = rolesSelect.value;

        // Validate input before adding
        if (!member || !role) {
            alert("Please select both a member and a role.");
            return;
        }

        // Ensure that the selected member is not already added
        if (selectedMembers.length >= 20) {
            alert("You can only select up to 20 members.");
            return;
        }

        if (selectedMembers.some(item => item.member === member)) {
            alert("This member is already added.");
            return;
        }

        // Add member to the array
        selectedMembers.push({ member, role });

        // Update the table
        const newRow = membersTableBody.insertRow();
        newRow.innerHTML = `
            <td>${membersSelect.options[membersSelect.selectedIndex].text}</td>
            <td>${rolesSelect.options[rolesSelect.selectedIndex].text}</td>
            <td><button type="button" class="btn btn-danger btn-sm" onclick="removeMember(this)">Remove</button></td>
        `;

        // Create new hidden input fields for member and role
        const memberInput = document.createElement("input");
        memberInput.type = "hidden";
        memberInput.name = "members[]";
        memberInput.value = member;
        newRow.appendChild(memberInput);  // Add hidden input to the row (so it can be deleted with the row)

        const roleInput = document.createElement("input");
        roleInput.type = "hidden";
        roleInput.name = "roles[]";
        roleInput.value = role;
        newRow.appendChild(roleInput);  // Add hidden input to the row (so it can be deleted with the row)

        // Clear selection after adding
        membersSelect.value = "";
        rolesSelect.value = "";
    });

    // Remove member from the table
    window.removeMember = function (button) {
        const row = button.closest("tr");
        const member = row.cells[0].textContent;

        // Remove the corresponding hidden input fields for member and role
        const memberInputs = row.querySelectorAll("input[name='members[]']");
        const roleInputs = row.querySelectorAll("input[name='roles[]']");

        memberInputs.forEach(input => input.remove());
        roleInputs.forEach(input => input.remove());

        // Remove member from the array
        selectedMembers = selectedMembers.filter(item => item.member !== member);

        // Remove row from table
        row.remove();
    };
});

</script>
@endsection





