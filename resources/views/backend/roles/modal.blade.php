<div class="modal fade" id="rolemodal" tabindex="-1" role="dialog"
aria-labelledby="rolemodalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
        <span style="cursor:pointer" class="label label-default" id="checkAll">Chọn tất</span>
        <span style="cursor:pointer" class="label label-default" id="uncheckAll">Bỏ tất</span>
        <span style="cursor:pointer"  class="label label-default" id="collapseAll">Thu gọn</span>
        <span style="cursor:pointer"  class="label label-default" id="expandAll">Mở ra</span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div id="treeview_container" class="hummingbird-treeview" data-height="450px"
                data-scroll="true" data-boldParents="true"
                style="height: 230px; overflow-y: scroll;">
                <ul id="treeview" class="hummingbird-base">
                    <li data-id="0">
                        <i></i>
                        <label>
                            <input name="permission[]" value="admin" data-id="check_all"
                                type="checkbox" />
                            <span class="label label-default "><i class="fa-solid fa-check"></i>
                                Quyền
                                cao nhất</span>

                        </label>
                        <ul>
                            @include(
                                'backend.roles.rolename.staticpage'
                            )
                            @include(
                                'backend.roles.rolename.billing'
                            )
                            @include(
                                'backend.roles.rolename.coupon'
                            )
                            @include(
                                'backend.roles.rolename.feeship'
                            )
                            @include(
                                'backend.roles.rolename.mailletter'
                            )
                            @include(
                                'backend.roles.rolename.contactletter'
                            )
                            @include(
                                'backend.roles.rolename.procat1'
                            )
                            @include(
                                'backend.roles.rolename.procat2'
                            )
                            @include(
                                'backend.roles.rolename.procat3'
                            )
                            @include(
                                'backend.roles.rolename.product'
                            )
                            @include(
                                'backend.roles.rolename.tag'
                            )
                            @include(
                                'backend.roles.rolename.servicescate'
                            )
                            @include(
                                'backend.roles.rolename.services'
                            )
                            @include(
                                'backend.roles.rolename.newcate1'
                            )
                            @include(
                                'backend.roles.rolename.newcate2'
                            )
                            @include(
                                'backend.roles.rolename.post'
                            )
                            @include(
                                'backend.roles.rolename.recruit'
                            )
                            @include(
                                'backend.roles.rolename.slider'
                            )
                            @include(
                                'backend.roles.rolename.partner'
                            )
                            @include(
                                'backend.roles.rolename.catemedia'
                            )
                            @include(
                                'backend.roles.rolename.media'
                            )
                             @include(
                                'backend.roles.rolename.filemanager'
                            )
                            @include(
                                'backend.roles.rolename.webconfig'
                            )
                            @include(
                                'backend.roles.rolename.grouprole'
                            )
                            @include(
                                'backend.roles.rolename.admin'
                            )
                            @include(
                                'backend.roles.rolename.modsource'
                            )
                            @include(
                                'backend.roles.rolename.language'
                            )
                            @include(
                                'backend.roles.rolename.menu'
                            )
                            @include(
                                'backend.roles.rolename.thumbsize'
                            )
                            @include(
                                'backend.roles.rolename.analytic'
                            )
                             @include(
                                'backend.roles.rolename.dashboard'
                            )
                             @include(
                                'backend.roles.rolename.maintain'
                            )
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
            <button type="submit" class="btn btn-primary">Lưu</button>
        </div>
    </div>
</div>
</div>
