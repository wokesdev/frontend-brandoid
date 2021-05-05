<script>
$(document).ready(function () {
    $.ajax({
        url: "{{ route('user.dashboard-data.purchase') }}",
        type: "GET",
        dataType: "json",
        success: function(data){
            var myCircle = Circles.create({
            id:                  'circles-purchase',
            radius:              60,
            value:               data,
            maxValue:            100,
            width:               10,
            text:                function(value){return value},
            colors:              ['#D3B6C6', '#483D8B'],
            duration:            400,
            wrpClass:            'circles-wrp',
            textClass:           'circles-text',
            valueStrokeClass:    'circles-valueStroke',
            maxValueStrokeClass: 'circles-maxValueStroke',
            styleWrapper:        true,
            styleText:           true
            });
        }
    });

    $.ajax({
        url: "{{ route('user.dashboard-data.sale') }}",
        type: "GET",
        dataType: "json",
        success: function(data){
            var myCircle = Circles.create({
            id:                  'circles-sale',
            radius:              60,
            value:               data,
            maxValue:            100,
            width:               10,
            text:                function(value){return value},
            colors:              ['#D3B6C6', '#483D8B'],
            duration:            400,
            wrpClass:            'circles-wrp',
            textClass:           'circles-text',
            valueStrokeClass:    'circles-valueStroke',
            maxValueStrokeClass: 'circles-maxValueStroke',
            styleWrapper:        true,
            styleText:           true
            });
        }
    });

    $.ajax({
        url: "{{ route('user.dashboard-data.cash-payment') }}",
        type: "GET",
        dataType: "json",
        success: function(data){
            var myCircle = Circles.create({
            id:                  'circles-cash-payment',
            radius:              60,
            value:               data,
            maxValue:            100,
            width:               10,
            text:                function(value){return value},
            colors:              ['#D3B6C6', '#483D8B'],
            duration:            400,
            wrpClass:            'circles-wrp',
            textClass:           'circles-text',
            valueStrokeClass:    'circles-valueStroke',
            maxValueStrokeClass: 'circles-maxValueStroke',
            styleWrapper:        true,
            styleText:           true
            });
        }
    });

    $.ajax({
        url: "{{ route('user.dashboard-data.cash-receipt') }}",
        type: "GET",
        dataType: "json",
        success: function(data){
            var myCircle = Circles.create({
            id:                  'circles-cash-receipt',
            radius:              60,
            value:               data,
            maxValue:            100,
            width:               10,
            text:                function(value){return value},
            colors:              ['#D3B6C6', '#483D8B'],
            duration:            400,
            wrpClass:            'circles-wrp',
            textClass:           'circles-text',
            valueStrokeClass:    'circles-valueStroke',
            maxValueStrokeClass: 'circles-maxValueStroke',
            styleWrapper:        true,
            styleText:           true
            });
        }
    });
});
</script>
