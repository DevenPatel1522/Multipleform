<tr align="center">
    <th><input type="checkbox" id="master"></th>
    <th>User Photo</th>
    <th>User sign Photo</th>
    <th>Firstname</th>
    <th>lastname</th>
    <th>phone</th>
    <th>email</th>
    <th>address</th>
    <th>Age</th>
    <th>ssc year</th>
    <th>ssc_marks</th>
    <th>hsc year</th>
    <th>hsc marks</th>
    <th>bachelor year</th>
    <th>bachelor CGPA</th>
    <th>master year</th>
    <th>master CGPA</th>
    <th>Status</th>
    <th>Action</th>
</tr>
@foreach ($users as $user)
    <tr align="center">
        <td><input type="checkbox" id="child{{$user->id}}" class="sub_chk" data-id={{$user->id}}></td>
        <td><img  class="myImages" id="myImg" src="@if (!empty($user->image->userimage)) {{ asset('public/image/' . $user->image->userimage)}}@else{{ asset('public/blank.png') }} @endif "
                width="50"></td>
        <td><img  class="myImages" id="myImg" src="@if (!empty($user->image->usersign)) {{ asset('public/sign/' . $user->image->usersign) }}@else{{ asset('public/blank.png') }} @endif "
                width="50"></td>
        <td>{{ $user->firstname }}</td>
        <td>{{ $user->lastname }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->address }}</td>
        <td>
            <div id="agefield{{ $user->id }}">
                <label>{{ $user->age }}</label>
                <select name="age" class="form-control show-data" placeholder="age"
                    id="functionedit{{ $user->id }}" style="display: none;">
                    <option name="age" value="25">25</option>
                    <option name="age" value="35">35</option>
                    <option name="age" value="45">45</option>
                    <option name="age" value="55">55</option>
                    <option name="age" value="65">65</option>
                </select>
            </div>
            <div>
                <button class="btn btn-info" onclick="editfun(this)" id="edit_age"><i class="far fa-edit"></i></button>
                <button class="btn btn-success" onclick="savefun(this,{{ $user->id }})" style="display: none;"
                    id="save_age">save</button>
            </div>
        </td>
        <td>{{$user->ssc_year }}</td>
        <td>{{$user->ssc_marks }}</td>
        <td>{{$user->hsc_year }}</td>
        <td>{{$user->hsc_marks }}</td>
        <td>{{$user->bachelor_year }}</td>
        <td>{{$user->bachelor_CGPA }}</td>
        <td>{{$user->master_year }}</td>
        <td>{{$user->master_CGPA }}</td>
        <td>
            <div id="statuscheck{{ $user->id }}">
                <div onclick="change({{ $user->id }})">
                    @if ($user->status == 0)
                        <button class="btn btn-danger">Deactive</button>
                    @else
                        <button class="btn btn-success">Active</button>
                    @endif
                </div>
            </div>
        </td>
        <td>
            <button type="submit" class="btn btn-info"><a href="{{ route('edit.get', $user->id) }}">
                    Edit</a></button>
            <button style="margin-top:10px;" class="btn btn-danger" onclick="deletefun({{ $user->id }})">
                Delete</button>
        </td>
    </tr>
@endforeach
