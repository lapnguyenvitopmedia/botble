<style>
    input[type=text] {
      width: 100%;
      padding: 12px 20px;
      margin: 8px 0;
      box-sizing: border-box;
      border: none;
      border-bottom: 2px solid #666666;
    }
    input[type="submit"] {
    margin-left: -50px;
    height: 20px;
    width: 50px;
    }
}
    </style>
<div class="col-md-3 col">
<div class="aside-box">
    <div class="aside-box-header">
        <h3>{{ $config['name'] }}</h3>
    </div>
    <div class="aside-box-content">
        <div class="form-group">
            <input type="text" id="fname" name="fname" placeholder="YOUR EMAIL">
            {{-- <input type="submit"> --}}
        </div>
    </div>
    <div class="aside-box-content">
        <p>{{$config['contents']}}</p>
    </div>
</div>
</div>
