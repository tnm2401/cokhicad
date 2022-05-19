<li >
    <i></i>
    <label>
        <input name=permission[] value="maintain_all"  data-id="maintain_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'maintain_all') }}/>
        <span class="label label-warning">Bảo trì</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="maintain_up" class="hummingbird-end-node"
                    data-id="maintain_up" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'maintain_up') }}/>
                <span class="label label-primary">Tắt</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="maintain_down" class="hummingbird-end-node"
                    data-id="maintain_down" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'maintain_down') }}/>
                <span class="label label-primary">Bật</span>
            </label>
        </li>

    </ul>
</li>
