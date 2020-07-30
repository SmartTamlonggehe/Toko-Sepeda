@extends('pelanggan.layout.default')

@section('judul', 'Bayar')

@section('content')

<div class="my-account-wrapper pt-100 pb-100 mt-5">
    <div class="container">
        <div class="row">
            @forelse ($bayar as $item)
            @php
            if ($item->bank=='BRI'){
                $an='Luis';
                $norek='123443123-21123231-12';
            }else {
                $an='Opan';
                $norek='544-656-2323234';
            }
        @endphp
            <div class="col-lg-12">
                <!-- My Account Page Start -->
                <div class="myaccount-page-wrapper">
                    <!-- My Account Tab Menu Start -->
                    <div class="row">
                        <div class="col-lg-3 col-md-4">
                            <div class="myaccount-tab-menu nav" role="tablist">
                                <a href="#dashboad{{ $item->id }}" class="active" data-toggle="tab"><i class="fa fa-dashboard"></i>
                                    Pembayaran </a>
                                @if ($item->status=='Sudah Bayar')
                                    <a href="#orders{{ $item->id }}" data-toggle="tab"><i class="fa fa-cart-arrow-down"></i> Status Kirim</a>
                                @endif

                            </div>
                        </div>
                        <!-- My Account Tab Menu End -->
                        <!-- My Account Tab Content Start -->
                        <div class="col-lg-9 col-md-8">
                            <div class="tab-content" id="myaccountContent">
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade show active" id="dashboad{{ $item->id }}" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Info Pembayaran</h3>
                                        <p class="mb-0">Harap Transfer Sesuai Nominal</p>
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td>Bank</td>
                                                    <td>:</td>
                                                    <td>{{ $item->bank }}</td>
                                                </tr>
                                                <tr>
                                                    <td>No. Rek</td>
                                                    <td>:</td>
                                                    <td>
                                                        {{ $norek }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>A/n</td>
                                                    <td>:</td>
                                                    <td>{{ $an }}</td>
                                                </tr>
                                                <tr>
                                                    <td>Total Bayar</td>
                                                    <td>:</td>
                                                    <td>Rp. @currency($item->total_bayar)</td>
                                                </tr>
                                                <tr>
                                                    <td>Status</td>
                                                    <td>:</td>
                                                    <td>{{ $item->status }}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- Single Tab Content End -->
                                <!-- Single Tab Content Start -->
                                <div class="tab-pane fade" id="orders{{ $item->id }}" role="tabpanel">
                                    <div class="myaccount-content">
                                        <h3>Rincian</h3>
                                        @foreach ($stakir as $itemStakir)
                                            @if ($itemStakir->id_bayar==$item->id)
                                            <table class="table">
                                                <tbody>
                                                    <tr>
                                                        <td>No Resi</td>
                                                        <td>:</td>
                                                        <td>{{ $itemStakir->no_resi }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Status Kiriman</td>
                                                        <td>:</td>
                                                        <td>{{ $itemStakir->status_kirim }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Penerima</td>
                                                        <td>:</td>
                                                        <td>{{ $itemStakir->bayar->tujuan->nm_penerima }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kecamatan</td>
                                                        <td>:</td>
                                                        <td>{{ $itemStakir->bayar->tujuan->kelurahan->kecamatan->nm_kecamatan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Kelurahan</td>
                                                        <td>:</td>
                                                        <td>{{ $itemStakir->bayar->tujuan->kelurahan->nm_kelurahan }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Alamat</td>
                                                        <td>:</td>
                                                        <td>{{ $itemStakir->bayar->tujuan->alamat }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div> <!-- My Account Tab Content End -->
                    </div>
                </div> <!-- My Account Page End -->
            </div>
            @empty

            @endforelse

        </div>
    </div>
</div>


@endsection
