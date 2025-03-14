          <div class="item-list">
              <div class="avatar">
                  <img
                      src="{{ asset('assets/admin/img/profile.jpg') }}"
                      alt="..."
                      class="avatar-img rounded-circle" />
              </div>
              <div class="info-user ms-3">
                  <div class="username">{{ $newUser->name }}</div>
                  <div class="status">Graphic Designer</div>
              </div>
              <button class="btn btn-icon btn-link op-8 me-1">
                  <i class="far fa-envelope"></i>
              </button>
              <button class="btn btn-icon btn-link btn-danger op-8">
                  <i class="fas fa-ban"></i>
              </button>
          </div>