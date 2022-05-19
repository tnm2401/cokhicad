<li >
    <i></i>
    <label>
        <input name=permission[] value="webconfig_all"  data-id="webconfig_all" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'webconfig_all') }}/>
        <span class="label label-warning">Cấu hình website</span>
    </label>
    <ul >
        <li>
            <label>
                <input name="permission[]" value="webconfig_seo" class="hummingbird-end-node"
                    data-id="webconfig_seo" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'webconfig_seo') }}/>
                <span class="label label-primary">SEO</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="webconfig_info" class="hummingbird-end-node"
                    data-id="webconfig_info" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'webconfig_info') }}/>
                <span class="label label-primary">Thông tin website</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="webconfig_social" class="hummingbird-end-node"
                    data-id="webconfig_social" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'webconfig_social') }}/>
                <span class="label label-primary">Mạng xã hội</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="webconfig_verify" class="hummingbird-end-node"
                    data-id="webconfig_verify" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'webconfig_verify') }}/>
                <span class="label label-primary">Xác thực website</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="webconfig_geo" class="hummingbird-end-node"
                    data-id="webconfig_geo" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'webconfig_geo') }}/>
                <span class="label label-primary">Geo localtion meta tag</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="webconfig_mod" class="hummingbird-end-node"
                    data-id="webconfig_mod" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'webconfig_mod') }}/>
                <span class="label label-primary">Tùy biến code</span>
            </label>
        </li>
        <li>
            <label>
                <input name="permission[]" value="webconfig_pic" class="hummingbird-end-node"
                    data-id="webconfig_pic" type="checkbox" {{ checkedRole (old('permission',json_decode($role->permissions ?? '')),'webconfig_pic') }}/>
                <span class="label label-primary">Hình ảnh</span>
            </label>
        </li>
    </ul>
</li>
