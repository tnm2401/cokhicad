<li >
    <i></i>
    <label>
        <input name=permission[] value="dashboard_all"  data-id="dashboard_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'dashboard_all') }}/>
        <span class="label label-warning">Dashboard</span>
    </label>

</li>
