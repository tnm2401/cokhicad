<li >
    <i></i>
    <label>
        <input name=permission[] value="analytic_all"  data-id="analytic_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'analytic_all') }}/>
        <span class="label label-warning">Analytics</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="ana_general" class="hummingbird-end-node"
                    data-id="ana_general" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'ana_general') }}/>
                <span class="label label-primary">Tổng quát</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="ana_access" class="hummingbird-end-node"
                    data-id="ana_access" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'ana_access') }}/>
                <span class="label label-primary">Truy Cập</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="ana_device" class="hummingbird-end-node"
                    data-id="ana_devide" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'ana_devide') }}/>
                <span class="label label-primary">Thiết bị</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="ana_country" class="hummingbird-end-node"
                    data-id="ana_country" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'ana_country') }}/>
                <span class="label label-primary">Quốc gia</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="ana_browser" class="hummingbird-end-node"
                    data-id="ana_browser" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'ana_browser') }}/>
                <span class="label label-primary">Trình duyệt</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="ana_site" class="hummingbird-end-node"
                    data-id="ana_site" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'ana_site') }}/>
                <span class="label label-primary">Trang xem nhiều</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="ana_ref" class="hummingbird-end-node"
                    data-id="ana_ref" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'ana_ref') }}/>
                <span class="label label-primary">Nguồn truy cập</span>
            </label>
        </li>
    </ul>
</li>
