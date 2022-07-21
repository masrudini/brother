@extends('users/layout/main')
@section('container')
    <section id="contact">
        <div class="inner">
            <section>
                <a href="/dashboard" class="btn btn-light" style="border: none"><i class="bi bi-arrow-left"></i></a>
                <header class="major mt-4">
                    <h2>Form Pesanan</h2>
                </header>
                <script>
                    function delAtr() {
                        var dateI1 = document.getElementById("date-from").value;
                        var dateI2 = document.getElementById("date-to");

                        var date1 = new Date(dateI1).getTime();
                        var now = new Date().getTime();
                        var selang = (date1 / (1000 * 60 * 60 * 24) - (now / (1000 * 60 * 60 * 24)));
                        if (selang > 2) {
                            alert("tidak bisa memesan lebih dari 3 hari kedepan");
                            location.reload();
                        }
                        dateI2.removeAttribute("readonly");
                    }

                    function daysDifference() {
                        //define two variables and fetch the input from HTML form
                        var dateI1 = document.getElementById("date-from").value;
                        var dateI2 = document.getElementById("date-to").value;
                        var total = document.getElementById("total");
                        var totalhid = document.getElementById("total-hidden").value;

                        //define two date object variables to store the date values
                        var date1 = new Date(dateI1);
                        var date2 = new Date(dateI2);

                        //calculate time difference
                        var time_difference = date2.getTime() - date1.getTime();
                        //calculate days difference by dividing total milliseconds in a day
                        var result = time_difference / (1000 * 60 * 60 * 24);
                        if (totalhid * result > 0) {
                            total.value = totalhid * result
                        } else {
                            alert("pilih tanggal yang benar")
                            location.reload();
                        }
                    }
                </script>
                <form method="post" action="/booking" enctype="multipart/form-data">
                    @csrf
                    <div class="field">
                        <label for="name">Nama</label>
                        <input class="rounded" type="text" name="name" id="name" style="height: 40px;"
                            value="{{ $session_user->name }}" required />
                        <br>
                    </div>
                    <div class="fields">
                        <div class="field half">
                            <label for="location">Alamat</label>
                            <input class="rounded" type="text" name="location" id="location" style="height: 40px;"
                                value="{{ $session_user->alamat }}" required />
                        </div>
                        <div class="field half">
                            <label for="no_hp">No Handphone</label>
                            <input class="rounded" type="text" name="no_hp" id="no_hp" style="height: 40px;"
                                value="" required />
                        </div>
                        <div class="field half">
                            <label for="date-from">Tanggal Mulai</label>
                            <input type="date" name="date_start" id="date-from" class="form-control"
                                style="background:rgba(212, 212, 255, 0.035); color:#ffffff; color-scheme:dark;"
                                OnChange="delAtr()" required />
                        </div>
                        <div class=" field half">
                            <label for="date-to">Tanggal Selesai</label>
                            <input type="date" name="date_end" id="date-to" class="form-control"
                                style="background:rgba(212, 212, 255, 0.035); color:#ffffff; color-scheme:dark;"
                                OnChange="daysDifference()" readonly required />
                        </div>
                        <div class="field half">
                            <label for="email">Email</label>
                            <input class="rounded" type="text" name="email" id="email" style="height: 40px;"
                                value="{{ $session_user->email }}" required />
                        </div>
                        <div class="field half">
                            <label for="total">Total harga</label>
                            <?php $total = 0; ?>
                            @foreach ($order_kendaraans as $order_kendaraan)
                                <?php
                                $harga = $order_kendaraan->kendaraan->harga_sewa;
                                $total += $harga;
                                ?>
                            @endforeach
                            <input type="hidden" name="total-hidden" id="total-hidden" value="{{ $total }}"
                                readonly="readonly" />
                            <input class="rounded" type="text" name="total" id="total" value="0"
                                style="height: 40px;" readonly="readonly" />
                        </div>
                        <div class="field half">
                            <label for="email">Upload KTP</label>
                            <input class="rounded" type="file" class="form-control @error('ktp') is-invalid @enderror"
                                style="background:rgba(212, 212, 255, 0.035); color:#ffffff;" name="ktp"
                                id="ktp" />
                            @error('ktp')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="field half">
                            <label for="email">Upload Bukti Bayar</label>
                            <input class="rounded" type="file" class="form-control @error('bayar') is-invalid @enderror"
                                style="background:rgba(212, 212, 255, 0.035); color:#ffffff;" name="bayar"
                                id="bayar" />
                            @error('bayar')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="field half">
                            <label for="email">Upload SIM</label>
                            <input class="rounded" type="file" class="form-control @error('sim') is-invalid @enderror"
                                style="background:rgba(212, 212, 255, 0.035); color:#ffffff;" name="sim"
                                id="sim" />
                            @error('sim')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="field half">
                            <label for="jaminan">Jaminan</label>
                            <input class="rounded" type="text" class="@error('jaminan') is-invalid @enderror"
                                name="jaminan" id="jaminan" style="height: 40px;" />
                            @error('jaminan')
                                {{ $message }}
                            @enderror
                        </div>
                        <div class="field half text-right">
                            <input class="rounded" type="submit" style="border-radius: 10px;" class="primary"
                                name="booking" value="SUBMIT" />
                        </div>
                        <?php $total_kendaraan = []; ?>
                        @foreach ($order_kendaraans as $order_kendaraan)
                            <?php array_push($total_kendaraan, $order_kendaraan->kendaraan_id); ?>
                        @endforeach
                        <?php $result = join(',', $total_kendaraan); ?>
                        <input type="hidden" name="kendaraan_id" id="kendaraan_id" value="{{ $result }}" />
                    </div>
                </form>
            </section>
            <section class="split">
                <section>
                    <div class="contact-method">
                        <span class="icon alt fa-envelope"></span>
                        <h3>Email</h3>
                        <a href="#">carrentalwebsite@untitled.tld</a>
                    </div>
                </section>
                <section>
                    <div class="contact-method">
                        <span class="icon alt fa-phone"></span>
                        <h3>Phone</h3>
                        <span>(000) 000-0000 x12387</span>
                        <br>
                        <span>(000) 000-0000 x12387</span>
                    </div>
                </section>
                <section>
                    <div class="contact-method">
                        <span class="icon alt fa-home"></span>
                        <h3>Address</h3>
                        <span>1234 Somewhere Road #5432<br />
                            Nashville, TN 00000<br />
                            United States of America</span>
                    </div>
                </section>
                <section>
                    <h3>Terms</h3>

                    <div class="box">
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam magnam quasi molestiae quo
                            repudiandae repellat dolore impedit alias soluta, excepturi aperiam aliquid numquam dignissimos
                            nulla exercitationem vel, fuga accusamus voluptate, ipsa quia. Possimus odit ipsam deleniti nisi
                            soluta voluptas! Nemo aperiam dignissimos, nisi. Necessitatibus cum quos dolor incidunt! Ab
                            voluptatum sapiente voluptas fuga in rem voluptatibus rerum ipsam eos dolorem aspernatur saepe
                            incidunt provident nihil, quos ad perspiciatis est voluptatem commodi. Repellat dolores, ipsam
                            facere ipsum, cumque deleniti perferendis delectus consequatur harum fuga et architecto vitae
                            neque suscipit. Aut vero architecto non maxime molestiae autem dolores, corporis, molestias esse
                            voluptatum nobis error minima deserunt provident consectetur. Qui, ipsa assumenda voluptatum
                            asperiores laudantium nobis harum sint quis sed quia, officiis odit eaque a! Quos provident eos
                            earum facilis nam consequuntur reiciendis amet sunt? Quia, quasi sunt. Aliquam labore vitae,
                            officiis ullam itaque. Id non est earum praesentium incidunt officia quos modi at suscipit
                            quibusdam. Id nostrum beatae ea atque, fugiat mollitia, eius, sed eos quidem itaque inventore
                            hic reiciendis quas doloremque illum. Enim eum labore odio alias. Consectetur molestias,
                            suscipit, animi amet enim eius, voluptates nulla sapiente earum tenetur explicabo iusto ad
                            officiis! Praesentium minus illo saepe voluptatibus obcaecati, excepturi, sit nam quaerat ab
                            velit deserunt tenetur magni quae temporibus! Iusto sapiente iste eos, ipsa dolores obcaecati
                            voluptas commodi, nesciunt officiis at quis magni quos, ducimus ad. Minus dicta blanditiis
                            voluptatum ipsa, voluptatem sequi eligendi nam est possimus libero aliquam, eos provident
                            repellendus dolores. Distinctio corrupti ea ipsam, dolore, dolorem similique eos illo iure ad
                            maxime, cumque doloribus iusto expedita quidem accusantium cum, voluptatibus ducimus! Neque eos
                            cupiditate at molestias sequi enim! Amet nesciunt dolorem quisquam sunt ad quos fugit at alias
                            distinctio nihil nostrum, itaque a repudiandae soluta dicta quasi, repellat quidem autem.
                            Architecto, esse porro iure repellat sed. Quidem?</p>
                    </div>
                </section>
            </section>
        </div>
    </section>
@endsection
