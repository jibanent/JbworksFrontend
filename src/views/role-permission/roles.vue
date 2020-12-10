<template>
  <div id="dashboard">
    <page-title-bar />
    <div class="row">
      <div class="col-full-lg-block col-sm-12 col-md-12 col-lg-12 grid-b-space">
        <app-card>
          <vue-perfect-scrollbar :settings="settings" style="height:450px">
            <div class="table-responsive recent-order">
              <table class="table table-striped custom-table">
                <thead>
                  <tr>
                    <th>{{ $t('message.id') }}</th>
                    <th>{{ $t('message.roles') }}</th>
                    <th>{{ $t('message.description') }}</th>
                    <th>{{ $t('message.createdAt') }}</th>
                    <th>{{ $t('message.createdBy') }}</th>
                    <th>{{ $t('message.action') }}</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>#1</td>
                    <td>
                      <router-link :to="{name: 'role', params: {id: 1}}">Admin</router-link>
                    </td>
                    <td>システム管理者</td>
                    <td>2020/12/1</td>
                    <td>admin</td>
                    <td class="table-action d-flex">
                      <a href="javascript:;" class="icon-btn text-muted">
                        <i class="zmdi zmdi-edit" />
                      </a>
                      <a href="javascript:;" class="icon-btn text-muted">
                        <i class="zmdi zmdi-delete" />
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>#2</td>
                    <td>
                      <router-link :to="{name: 'role', params: {id: 1}}">Manager</router-link>
                    </td>
                    <td>全ての部署の内容を確認でき、コメントもできます。</td>
                    <td>2020/12/1</td>
                    <td>admin</td>
                    <td class="table-action d-flex">
                      <a href="javascript:;" class="icon-btn text-muted">
                        <i class="zmdi zmdi-edit" />
                      </a>
                      <a href="javascript:;" class="icon-btn text-muted">
                        <i class="zmdi zmdi-delete" />
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>#3</td>
                    <td>
                      <router-link :to="{name: 'role', params: {id: 1}}">Sub-manager</router-link>
                    </td>
                    <td>システム管理者</td>
                    <td>2020/12/1</td>
                    <td>admin</td>
                    <td class="table-action d-flex">
                      <a href="javascript:;" class="icon-btn text-muted">
                        <i class="zmdi zmdi-edit" />
                      </a>
                      <a href="javascript:;" class="icon-btn text-muted">
                        <i class="zmdi zmdi-delete" />
                      </a>
                    </td>
                  </tr>
                  <tr>
                    <td>#4</td>
                    <td>
                      <router-link :to="{name: 'role', params: {id: 1}}">member</router-link>
                    </td>
                    <td>地盤ネットの社員。部署の内容を確認でき、コメントもできます。</td>
                    <td>2020/12/1</td>
                    <td>admin</td>
                    <td class="table-action d-flex">
                      <a href="javascript:;" class="icon-btn text-muted">
                        <i class="zmdi zmdi-edit" />
                      </a>
                      <a href="javascript:;" class="icon-btn text-muted">
                        <i class="zmdi zmdi-delete" />
                      </a>
                    </td>
                  </tr>
                 <tr>
                   <td>#5</td>
                   <td>
                     <router-link :to="{name: 'role', params: {id: 1}}">FCビルダーメンバー</router-link>
                   </td>
                   <td>FCメンバーで社外のユーザー。部署の内容を確認できませんし、コメントもできません。報告書の提出しかできません。</td>
                   <td>2020/12/1</td>
                   <td>admin</td>
                   <td class="table-action d-flex">
                     <a href="javascript:;" class="icon-btn text-muted">
                       <i class="zmdi zmdi-edit" />
                     </a>
                     <a href="javascript:;" class="icon-btn text-muted">
                       <i class="zmdi zmdi-delete" />
                     </a>
                   </td>    
                   </tr>              
                </tbody>
              </table>
            </div>
          </vue-perfect-scrollbar>
        </app-card>
      </div>
    </div>
  </div>
</template>

<script>
export default {
}
</script>