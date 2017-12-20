@extends('layouts.web')

@section('content')
    <section class="home">

        <div class="row">
            <div class="col-2">
                <div class="widget chart-widget">
                    <div class="widget-header">Красные/Черные победы</div>
                    <div class="widget-body">
                        <div id='red-black-wins'></div>
                    </div>
                </div>
            </div>

            <div class="col-2">
                <div class="widget chart-widget">
                    <div class="widget-header">Черные победы</div>
                    <div class="widget-body">
                        <div id='black-wins'></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('page-js')
    <script type="text/javascript" src="{{ asset('web/plugins/zingchart/zingchart.js') }}"></script>
    <script>
        var rebBlackWinConfig = {
            backgroundColor: '#fff',
            type: "ring",
            plot: {
                slice: '25%',
                borderWidth: 3,
                backgroundColor: '#FBFCFE'
            },
            plotarea: {
                backgroundColor: 'transparent',
                borderWidth: 0,
                borderRadius: "0 0 0 10",
                margin: "10 0 10 0"
            },
            legend: {
                toggleAction: 'remove',
                backgroundColor: '#FBFCFE',
                borderWidth: 0,
                adjustLayout: true,
                align: 'center',
                verticalAlign: 'bottom',
                marker: {
                    type: 'circle',
                    cursor: 'pointer',
                    borderWidth: 0,
                    size: 5
                },
                item: {
                    fontColor: "#777",
                    cursor: 'pointer',
                    offsetX: -6,
                    fontSize: 12
                },
                mediaRules: [{
                    maxWidth: 500,
                    visible: false
                }]
            },
            scaleR: {
                refAngle: 270
            },
            series: [{
                text: "Красные победы",
                values: [{{ $red_win_count }}],
                lineColor: "#ee3a53",
                backgroundColor: "#ee3a53",
                lineWidth: 1,
                marker: {
                    backgroundColor: '#ee3a53'
                }
            }, {
                text: "Черные победы",
                values: [{{ $black_win_count }}],
                lineColor: "#5f5554",
                backgroundColor: "#5f5554",
                lineWidth: 1,
                marker: {
                    backgroundColor: '#5f5554'
                }
            }]
        };

        var blackWinConfig = {
            backgroundColor: '#fff',
            type: "ring",
            plot: {
                slice: '0%',
                borderWidth: 3,
                backgroundColor: '#FBFCFE'
            },
            plotarea: {
                backgroundColor: 'transparent',
                borderWidth: 0,
                borderRadius: "0 0 0 10",
                margin: "10 0 10 0"
            },
            legend: {
                toggleAction: 'remove',
                backgroundColor: '#FBFCFE',
                borderWidth: 0,
                adjustLayout: true,
                align: 'center',
                verticalAlign: 'bottom',
                marker: {
                    type: 'circle',
                    cursor: 'pointer',
                    borderWidth: 0,
                    size: 5
                },
                item: {
                    fontColor: "#777",
                    cursor: 'pointer',
                    offsetX: -6,
                    fontSize: 12
                },
                mediaRules: [{
                    maxWidth: 500,
                    visible: false
                }]
            },
            scaleR: {
                refAngle: 270
            },
            series: [{
                text: "1 в 1",
                values: [{{ $black_win_1_1_count }}],
                lineColor: "#c1c1c1",
                backgroundColor: "#c1c1c1",
                lineWidth: 1,
                marker: {
                    backgroundColor: '#c1c1c1'
                }
            }, {
                text: "2 в 2",
                values: [{{ $black_win_2_2_count }}],
                lineColor: "#868686",
                backgroundColor: "#868686",
                lineWidth: 1,
                marker: {
                    backgroundColor: '#868686'
                }
            }, {
                text: "3 в 3",
                values: [{{ $black_win_3_3_count }}],
                lineColor: "#262626",
                backgroundColor: "#262626",
                lineWidth: 1,
                marker: {
                    backgroundColor: '#262626'
                }
            }]
        };

        zingchart.render({
            id: 'red-black-wins',
            data: {
                graphset: [rebBlackWinConfig]
            },
            height: '380',
            width: '99%'
        });

        zingchart.render({
            id: 'black-wins',
            data: {
                graphset: [blackWinConfig]
            },
            height: '380',
            width: '99%'
        });
    </script>
@endsection
