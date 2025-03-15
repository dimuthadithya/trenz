          <tr>
              <td>
                  <div class="d-flex align-items-center">
                      <img
                          src="https://mdbootstrap.com/img/new/avatars/8.jpg"
                          alt=""
                          style="width: 45px; height: 45px"
                          class="rounded-circle" />
                      <div class="ms-3">
                          <p class="mb-1 fw-bold">{{{ $user['name'] }}}</p>
                          <p class="mb-0 text-muted">{{{ $user['email'] }}}</p>
                      </div>
                  </div>
              </td>
              <td>{{ $user->total_order_count }}</td>
              <td>
                  ${{ $user->total_payment_amount }}
              </td>
              <td>
                  <span class="badge badge-success rounded-pill d-inline">Active</span>
              </td>
              <td>{{ $user['created_at'] }}</td>
              <td>
                  <button class="btn btn-link btn-sm fw-bold">Suspend</button>
                  <button class="btn btn-link btn-sm fw-bold">Delete</button>
              </td>

          </tr>