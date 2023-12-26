@extends('layouts.user_type.auth')

@section('content')
    <div>
        <div class="container-fluid">
            <div class="page-header min-height-300 border-radius-xl mt-4"
                style="background-image: url('../assets/img/curved-images/curved0.jpg'); background-position-y: 50%;">
                <span class="mask bg-gradient-primary opacity-6"></span>
            </div>
            <div class="card card-body blur shadow-blur mx-4 mt-n6">
                <div class="row gx-4">
                    <div class="col-auto">
                        <div class="avatar avatar-xl position-relative">
                            <img src="{{ empty(auth()->user()->pict) ? '../assets/img/bruce-mars.jpg' : auth()->user()->pict }}""
                                alt="..." class="w-100 border-radius-lg shadow-sm">
                            <a href="javascript:;"
                                class="btn btn-sm btn-icon-only bg-gradient-light position-absolute bottom-0 end-0 mb-n2 me-n2"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="fa fa-pen top-0" data-bs-toggle="tooltip" data-bs-placement="top"
                                    title="Edit Image"></i>
                            </a>
                        </div>
                    </div>
                    <div class="col-auto my-auto">
                        <div class="h-100">
                            <h5 class="mb-1">
                                {{ auth()->user()->name }}
                            </h5>
                            <p class="mb-0 font-weight-bold text-sm">
                                {{ auth()->user()->nim }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid py-4">
            <div class="card">
                <div class="card-header pb-0 px-3">
                    <h6 class="mb-0">{{ __('Profile Information') }}</h6>
                </div>
                <div class="card-body pt-4 p-3">
                    <form action="/user-profile" method="POST" role="form text-left">
                        @csrf
                        @if ($errors->any())
                            <div class="mt-3  alert alert-primary alert-dismissible fade show" role="alert">
                                <span class="alert-text text-white">
                                    {{ $errors->first() }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                        @if (session('success'))
                            <div class="m-3  alert alert-success alert-dismissible fade show" id="alert-success"
                                role="alert">
                                <span class="alert-text text-white">
                                    {{ session('success') }}</span>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa fa-close" aria-hidden="true"></i>
                                </button>
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-name" class="form-control-label">{{ __('Full Name') }}</label>
                                    <div class="@error('user.name')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ auth()->user()->name }}" type="text"
                                            placeholder="Name" id="user-name" name="name">
                                        @error('name')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user-email" class="form-control-label">{{ __('Email') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input class="form-control" value="{{ auth()->user()->email }}" type="email"
                                            placeholder="@example.com" id="user-email" name="email">
                                        @error('email')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user.phone" class="form-control-label">{{ __('Phone') }}</label>
                                    <div class="@error('user.phone')border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="tel" placeholder="40770888444" id="number"
                                            name="phone" value="{{ auth()->user()->phone }}">
                                        @error('phone')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user.nim" class="form-control-label">{{ __('NIM') }}</label>
                                    <div class="@error('user.nim') border border-danger rounded-3 @enderror">
                                        <input class="form-control" type="text" placeholder="" id="nim"
                                            name="nim" value="{{ auth()->user()->nim }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="user.prodi" class="form-control-label">{{ __('Program Studi') }}</label>
                                    <div class="@error('user.prodi')border border-danger rounded-3 @enderror">
                                        <select name="prodi" id="prodi" class="form-select"">
                                            <option value="" disabled>Pilih Prodi</option>
                                            <option value="ti" {{ auth()->user()->prodi === 'ti' ? 'selected' : '' }}>
                                                Teknik Informatika</option>
                                            <option value="si" {{ auth()->user()->prodi === 'si' ? 'selected' : '' }}>
                                                Sistem Informasi</option>
                                        </select>
                                        @error('phone')
                                            <p class="text-danger text-xs mt-2">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="about">{{ 'About Me' }}</label>
                            <div class="@error('user.about')border border-danger rounded-3 @enderror">
                                <textarea class="form-control" id="about" rows="3" placeholder="Say something about yourself"
                                    name="about_me">{{ auth()->user()->about_me }}</textarea>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit"
                                class="btn bg-gradient-dark btn-md mt-4 mb-4">{{ 'Save Changes' }}</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Update Foto Profile</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-center">
                    <input type="file" class="form-control col-lg-10" name="pict" id="inputProfile"
                        accept="image/*">
                    <span id="imgProfile" class="col-lg-10">
                        @if (!empty(auth()->user()->pict))
                            <img src="{{ auth()->user()->pict }}" alt="" width="300px" height="300px"
                                style="margin-top:20px;">
                        @endif
                    </span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        var inputPict = document.getElementById('inputProfile');
        var inputDisplay = document.getElementById('imgProfile');

        inputPict.addEventListener('change', function() {
            if ($(this.files && this.files[0])) {
                const reader = new FileReader();

                reader.onload = function(e) {
                    console.log(e.target.result);
                    const imgElement = document.createElement('img');

                    imgElement.src = e.target.result;
                    imgElement.style.maxWidth = "300px";
                    imgElement.style.maxHeight = "300px";
                    imgElement.style.marginTop = "20px";
                    inputDisplay.innerHtml = '';
                    inputDisplay.appendChild(imgElement);
                }
                reader.readAsDataURL(inputPict.files[0]);
            }
        });
    </script>
@endsection
