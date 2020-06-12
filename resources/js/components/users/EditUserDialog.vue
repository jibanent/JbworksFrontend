<template>
  <div id="apdialogs" style="display: block;" v-if="showEditUserDialog">

    <div class="__fdialog __temp __dialog __canvas_closable __dialog_ontop">
      <div class="__closable"></div>
      <div class="__fdialogwrapper scroll-y forced-scroll">
        <div class="__dialogwrapper" style="top: 50%; left: 50%; transform: translate(-50%, -50%)" >
          <div class="__dialogwrapper-inner">
            <div class="__dialogmain">
              <div class="__dialogtitlewrap">
                <div class="left relative">
                  <div
                    class="__dialogtitle unselectable ap-xdot"
                    onclick="AP.dialog(&quot;#edit-fx-dx&quot;).balance();"
                  >Chỉnh sửa thông tin cá nhân</div>
                  <div class="__dialogtitlerender tx-fill"></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="__dialogclose" @click="hideEditUserDialog">
                <span class="-ap icon-close"></span>
              </div>
              <div class="__dialogcontent">
                <div id="edit-fx-dx" class="__apdialog" title style="width: 720px;">
                  <div class="form form-dialog form-inline">
                    <form method="post" id="edit-profile-fx" action="api/me/edit">
                      <div class="row -istext" id="_uuid80159_16504_1591860463">
                        <div class="label">
                          Tên của bạn
                          <div class="sublabel">Tên của bạn</div>
                        </div>
                        <div class="input data">
                          <input
                            autocomplete="off"
                            data-role
                            id="_uuid23653_94233_1591860463"
                            type="text"
                            name="first_name"
                            placeholder="Tên của bạn"
                            class="std"
                          />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext" id="_uuid16027_41257_1591860463">
                        <div class="label">
                          Họ của bạn
                          <div class="sublabel">Họ của bạn</div>
                        </div>
                        <div class="input data">
                          <input
                            autocomplete="off"
                            data-role
                            id="_uuid55898_43070_1591860463"
                            type="text"
                            name="last_name"
                            placeholder="Họ của bạn"
                            class="std"
                          />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isfake" id="_uuid11852_61010_1591860463">
                        <div class="label">
                          Email
                          <div class="sublabel">Email của bạn</div>
                        </div>
                        <div class="input data">
                          <div
                            class="input-fake ap-xdot"
                            id="_uuid69207_97738_1591860463"
                          >thuytrangenglish@gmail.com</div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isfake" id="_uuid85101_99982_1591860463">
                        <div class="label">
                          Username
                          <div class="sublabel">Username của bạn</div>
                        </div>
                        <div class="input data">
                          <div class="input-fake ap-xdot" id="_uuid11365_23872_1591860463">
                            @
                            <b>thuytrang</b>
                          </div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext" id="_uuid78400_7865_1591860463">
                        <div class="label">
                          Vị trí công việc
                          <div class="sublabel">Vị trí công việc</div>
                        </div>
                        <div class="input data">
                          <input
                            autocomplete="off"
                            data-role
                            id="_uuid58451_52798_1591860463"
                            type="text"
                            name="title"
                            placeholder="Vị trí công việc"
                            class="std"
                          />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isfile" id="_uuid39922_71646_1591860463">
                        <div class="label">
                          Ảnh đại diện
                          <div class="sublabel">Ảnh đại diện</div>
                        </div>
                        <div class="input data">
                          <input id="_uuid34364_65894_1591860463" type="file" name="image" />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -isbase" id="_uuid56293_81195_1591860463">
                        <div class="label">
                          Ngày tháng năm sinh
                          <div class="sublabel">Ngày tháng năm sinh</div>
                        </div>
                        <div class="input-group -count-3">
                          <div class="gi" style="width: 33.333333333333336%">
                            <div class="select data">
                              <select id="_uuid75561_29115_1591860463" name="dob_day">
                                <option value="0">-- Chọn ngày --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                                <option value="13">13</option>
                                <option value="14">14</option>
                                <option value="15">15</option>
                                <option value="16">16</option>
                                <option value="17">17</option>
                                <option value="18">18</option>
                                <option value="19">19</option>
                                <option value="20">20</option>
                                <option value="21">21</option>
                                <option value="22">22</option>
                                <option value="23">23</option>
                                <option value="24">24</option>
                                <option value="25">25</option>
                                <option value="26">26</option>
                                <option value="27">27</option>
                                <option value="28">28</option>
                                <option value="29">29</option>
                                <option value="30">30</option>
                                <option value="31">31</option>
                              </select>
                            </div>
                          </div>
                          <div class="gi" style="width: 33.333333333333336%">
                            <div class="select data">
                              <select id="_uuid36387_61333_1591860463" name="dob_month">
                                <option value="0">-- Chọn tháng --</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                              </select>
                            </div>
                          </div>
                          <div class="gi" style="width: 33.333333333333336%">
                            <div class="select data">
                              <select id="_uuid45643_72793_1591860463" name="dob_year">
                                <option value="0">-- Chọn năm --</option>
                                <option value="2010">2010</option>
                                <option value="2009">2009</option>
                                <option value="2008">2008</option>
                                <option value="2007">2007</option>
                                <option value="2006">2006</option>
                                <option value="2005">2005</option>
                                <option value="2004">2004</option>
                                <option value="2003">2003</option>
                                <option value="2002">2002</option>
                                <option value="2001">2001</option>
                                <option value="2000">2000</option>
                                <option value="1999">1999</option>
                                <option value="1998">1998</option>
                                <option value="1997">1997</option>
                                <option value="1996">1996</option>
                                <option value="1995">1995</option>
                                <option value="1994">1994</option>
                                <option value="1993">1993</option>
                                <option value="1992">1992</option>
                                <option value="1991">1991</option>
                                <option value="1990">1990</option>
                                <option value="1989">1989</option>
                                <option value="1988">1988</option>
                                <option value="1987">1987</option>
                                <option value="1986">1986</option>
                                <option value="1985">1985</option>
                                <option value="1984">1984</option>
                                <option value="1983">1983</option>
                                <option value="1982">1982</option>
                                <option value="1981">1981</option>
                                <option value="1980">1980</option>
                                <option value="1979">1979</option>
                                <option value="1978">1978</option>
                                <option value="1977">1977</option>
                                <option value="1976">1976</option>
                                <option value="1975">1975</option>
                                <option value="1974">1974</option>
                                <option value="1973">1973</option>
                                <option value="1972">1972</option>
                                <option value="1971">1971</option>
                                <option value="1970">1970</option>
                                <option value="1969">1969</option>
                                <option value="1968">1968</option>
                                <option value="1967">1967</option>
                                <option value="1966">1966</option>
                                <option value="1965">1965</option>
                                <option value="1964">1964</option>
                                <option value="1963">1963</option>
                                <option value="1962">1962</option>
                                <option value="1961">1961</option>
                                <option value="1960">1960</option>
                                <option value="1959">1959</option>
                                <option value="1958">1958</option>
                                <option value="1957">1957</option>
                                <option value="1956">1956</option>
                                <option value="1955">1955</option>
                                <option value="1954">1954</option>
                                <option value="1953">1953</option>
                                <option value="1952">1952</option>
                                <option value="1951">1951</option>
                                <option value="1950">1950</option>
                                <option value="1949">1949</option>
                                <option value="1948">1948</option>
                                <option value="1947">1947</option>
                                <option value="1946">1946</option>
                                <option value="1945">1945</option>
                                <option value="1944">1944</option>
                                <option value="1943">1943</option>
                                <option value="1942">1942</option>
                                <option value="1941">1941</option>
                                <option value="1940">1940</option>
                                <option value="1939">1939</option>
                                <option value="1938">1938</option>
                                <option value="1937">1937</option>
                                <option value="1936">1936</option>
                                <option value="1935">1935</option>
                                <option value="1934">1934</option>
                                <option value="1933">1933</option>
                                <option value="1932">1932</option>
                                <option value="1931">1931</option>
                                <option value="1930">1930</option>
                              </select>
                            </div>
                          </div>
                          <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istext" id="_uuid75765_30577_1591860463">
                        <div class="label">
                          Số điện thoại
                          <div class="sublabel">Số điện thoại</div>
                        </div>
                        <div class="input data">
                          <input
                            autocomplete="off"
                            data-role
                            id="_uuid15486_74864_1591860463"
                            type="text"
                            name="phone"
                            placeholder="Số điện thoại"
                            class="std"
                          />
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div class="row -istextarea" id="_uuid1913_62373_1591860463">
                        <div class="label">
                          Chỗ ở hiện nay
                          <div class="sublabel">Chỗ ở hiện nay</div>
                        </div>
                        <div class="input data">
                          <textarea
                            data-role
                            id="_uuid70940_96986_1591860463"
                            name="address"
                            placeholder="Chỗ ở hiện nay"
                          ></textarea>
                        </div>
                        <div class="clear"></div>
                      </div>
                      <div style="display:none">
                        <input type="hidden" name="__code" value="5bc58d34ff3bdba68eab8461b7cc6a3a" />
                      </div>
                      <div class="form-buttons -two">
                        <div class="button ok -success -rounded bold">Cập nhật</div>
                        <div class="button cancel -passive-2 -rounded" @click="hideEditUserDialog">Bỏ qua</div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'edit-user-dialog',
  props: {
    showEditUserDialog: {type: Boolean, default: false},
    myProfile: {type: Object, default: null }
  },
  methods: {
    hideEditUserDialog() {
      this.$store.commit('TOGGLE_EDIT_USER_DIALOG');
    }
  },
};
</script>

<style>
</style>
