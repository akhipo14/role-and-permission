    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    @auth
                        <form action="{{ route('logout') }}" method="POST" class="w-100 mb-0">
                            <li class="d-flex align-items-center justify-content-center">
                                @csrf <!-- CSRF token untuk keamanan -->
                                <div class="d-flex gap-2">
                                    <button type="submit" class="btn btn-danger w-80">Logout</button>
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                </div>
                            </li>
                        </form>
                    @endauth
                </div>
            </div>
        </div>
    </div>
