@extends('users/layout/main')
@section('container')
    <section id="contact">
        <div class="inner">
            <section>
                <header class="major">
                    <h2>Pesanan</h2>
                </header>
                @foreach ($orders as $order)
                    <form action="/paying" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="field">
                            <label for="name">Nama</label>
                            <input class="rounded" type="text" name="name" id="name"
                                value="{{ $order->user->name }}" readonly />
                            <br>
                        </div>
                        <div class="fields">
                            <div class="field half">
                                <label for="location">Alamat</label>
                                <input class="rounded" type="text" name="location" id="location"
                                    value="{{ $order->user->alamat }}" readonly />
                            </div>
                            <div class="field half">
                                <label for="no_hp">Kendaraan yang Dipilih</label>
                                <?php $ids = explode(',', $order->kendaraan_id); ?>
                                <select class="rounded" name='merek' id='merek'>
                                    @foreach ($ids as $id)
                                        <option value="">
                                            {{ $kendaraans->firstWhere('id', $id)->jenisKendaraan->merek }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="field half">
                                <label for="date-from">Tanggal Pesan</label>
                                <input type="date" name="date_start" id="date-from" class="form-control"
                                    style="background:rgba(212, 212, 255, 0.035); color:#ffffff; color-scheme:dark;"
                                    value="{{ $order->date_start }}" readonly />
                            </div>
                            <div class=" field half">
                                <label for="date-to">Tanggal Selesai</label>
                                <input type="date" name="date_end" id="date-to" class="form-control"
                                    style="background:rgba(212, 212, 255, 0.035); color:#ffffff; color-scheme:dark;"
                                    value="{{ $order->date_end }}" readonly />
                            </div>
                            <div class="field half">
                                <label for="email">Email</label>
                                <input class="rounded" type="text" name="email" id="email"
                                    value="{{ $order->user->email }}" readonly />
                            </div>
                            <div class="field half">
                                <label for="total">Total Harga</label>
                                <input class="rounded" type="text" name="total" id="total"
                                    value="{{ $order->total_harga }}" readonly />
                            </div>
                            <div class="field half">
                                <label for="email">Upload KTP</label>
                                <input class="rounded" type="file"
                                    class="form-control @error('ktp') is-invalid @enderror"
                                    style="background:rgba(212, 212, 255, 0.035); color:#ffffff;" name="ktp"
                                    id="ktp" required />
                                @error('ktp')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="field half">
                                <label for="email">Upload Bukti Bayar</label>
                                <input class="rounded" type="file"
                                    class="form-control @error('bayar') is-invalid @enderror"
                                    style="background:rgba(212, 212, 255, 0.035); color:#ffffff;" name="bayar"
                                    id="bayar" required />
                                @error('bayar')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="field half">
                                <label for="email">Upload SIM</label>
                                <input class="rounded" type="file"
                                    class="form-control @error('sim') is-invalid @enderror"
                                    style="background:rgba(212, 212, 255, 0.035); color:#ffffff;" name="sim"
                                    id="sim" required />
                                @error('sim')
                                    {{ $message }}
                                @enderror
                            </div>
                            <div class="field half">
                                <label for="jaminan">Jaminan</label>
                                <input class="rounded" type="text" name="jaminan" id="jaminan" style="height: 40px;"
                                    required />
                            </div>
                            <input type="hidden" name="order_id" id="order_id" value="{{ $order->id }}">
                            <div class="field half text-right">
                                <input class="rounded primary" type="submit" class="primary" value="SUBMIT" />
                            </div>
                        </div>
                    </form>
                @endforeach
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
