<li >
    <i></i>
    <label>
        <input name=permission[] value="filemanager"  data-id="filemanager" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'filemanager') }}/>
        <span class="label label-warning">Quản lí file</span>
    </label>
</li>
