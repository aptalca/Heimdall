<section class="module-container">
        <header>
            <div class="section-title">{{ $setting->label }}</div>
            <div class="module-actions">
                <button type="submit"class="button"><i class="fa fa-save"></i><span>Save</span></button>
                <a href="{{ route('settings.index') }}" class="button"><i class="fa fa-ban"></i><span>Cancel</span></a>
            </div>
        </header>
        <div class="create">
            {!! csrf_field() !!}
            <!--<div class="input">
                <label>Application name</label>
                {!! Form::select('supported', \App\Item::supportedOptions(), array('placeholder' => 'Title','class' => 'form-control')) !!}
            </div>-->

            <div class="input">
                    {!! $setting->edit_value !!}
            </div>

            
        </div>
        <footer>
            <div class="section-title">&nbsp;</div>
            <div class="module-actions">
                <button type="submit"class="button"><i class="fa fa-save"></i><span>Save</span></button>
                <a href="{{ route('settings.index') }}" class="button"><i class="fa fa-ban"></i><span>Cancel</span></a>
            </div>
        </footer>

    </section>
