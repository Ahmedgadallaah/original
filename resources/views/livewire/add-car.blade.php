<div>
    <div class="form-grid">
        <label for=""><small>ماركة السيارة</small></label>
        <select name="mark_id" id="slick" wire:model="mark" required>
          <option  selected>اختر</option>
            @foreach ($marks as $mark)
                <option value="{{ $mark->id }}" data-description='' style="color:#000;"> {{ $mark->name }}
                </option>
            @endforeach
            <option value="1" data-description='' data-imagesrc="images/car-type.png"> تويوتا </option>
        </select>
    </div>
    <div class="form-grid">
        <label for=""><small>فئة السيارة</small></label>
        <select name="model_id" id="" required wire:model="model">
            <option  selected>اختر</option>
            @foreach ($models as $model)
                <option value="{{ $model->id }}" data-description='' style="color:#000;"> {{ $model->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-grid">
        <label for=""><small>نوع المحرك</small></label>
        <select name="engine_id" id="" required>
            <option disabled selected>اختر</option>
            @foreach ($engines as $engine)
                <option value="{{ $engine->id }}" data-description='' style="color:#000;"> {{ $engine->name }}
                </option>
            @endforeach
        </select>
    </div>
    <div class="form-grid">
        <label for=""><small>سنة التصنيع</small></label>
        <select name="year_id" id="" required>
            <option disabled selected>اختر</option>
            @foreach ($years as $year)
                <option value="{{ $year->id }}" data-description='' style="color:#000;"> {{ $year->year }}
                </option>
            @endforeach
        </select>
    </div>
</div>
