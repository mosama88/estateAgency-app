<div class="box-collapse">
    <div class="title-box-d">
      <h3 class="title-d">بحث عن الوحدات</h3>
    </div>
    <span class="close-box-collapse right-boxed bi bi-x"></span>
    <div class="box-collapse-wrap form">
        <form class="form-a" action="{{ route('front.current-search') }}" method="GET">
          <div class="row">
            <div class="col-md-12 mb-2">
              <div class="form-group">
                <label class="pb-2" for="Type">Keyword</label>
                <input type="text" name="search" class="form-control form-control-lg form-control-a" placeholder="Keyword">
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="form-group mt-3">
                <label class="pb-2" for="Type">نوع</label>
                <select class="form-control form-select form-control-a" name="type" >
                  <option>كل الأنواع</option>
                  <option value="sell">للبيع</option>
                  <option value="rent">للإيجار</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="form-group mt-3">
                <label class="pb-2" for="city">المدينه</label>
                <select class="form-control form-select form-control-a" id="city">
                  <option>كل المدن</option>
                  <option>القاهرة الكبرى</option>
                  <option>الأسكندرية</option>
                  <option>الدقهلية</option>
                  <option>أسيوط</option>
                  <option>الأقصر</option>
                  <option>أسوان</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="form-group mt-3">
                <label class="pb-2" for="bedrooms">غرف نوم</label>
                <select class="form-control form-select form-control-a" id="bedrooms">
                  <option>Any</option>
                  <option>01</option>
                  <option>02</option>
                  <option>03</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="form-group mt-3">
                <label class="pb-2" for="garages">نوع الوحده</label>
                <select class="form-control form-select form-control-a" name="status" id="garages">
                  <option>Any</option>
                  <option value="villa">فيلا</option>
                  <option value="Apartment">شقه</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="form-group mt-3">
                <label class="pb-2" for="bathrooms">الحمامات</label>
                <select class="form-control form-select form-control-a" id="bathrooms">
                  <option>Any</option>
                  <option>01</option>
                  <option>02</option>
                  <option>03</option>
                </select>
              </div>
            </div>
            <div class="col-md-6 mb-2">
              <div class="form-group mt-3">
                <label class="pb-2" for="price">أقل سعر</label>
                <select class="form-control form-select form-control-a" id="price">
                  <option>غير محدود</option>
                  <option> جنيه 50,000</option>
                  <option> جنيه 100,000</option>
                  <option> جنيه 150,000</option>
                  <option> جنيه 200,000</option>
                </select>
              </div>
            </div>
            <div class="col-md-12">
              <button type="submit" class="btn btn-b">أبحث</button>
            </div>
          </div>
        </form>
    </div>
  </div><!-- End Property Search Section -->

</form>