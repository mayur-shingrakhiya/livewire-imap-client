<div class="sign-in-from d-flex flex-column justify-content-center">
    <h1 class="mb-0">Sign Up</h1>
    <form class="mt-4"
          wire:submit.prevent='submit'>
        <div class="form-group">

            <x-input-text name="fullname"
                          type="text"
                          label="Your Full Name"
                          fieldgroup="form-group"
                          placeholder="Your full name"
                          class="form-control" />

            <x-input-text name="email"
                          type="email"
                          label="Email address"
                          fieldgroup="form-group"
                          placeholder="Email address"
                          class="form-control" />
            <x-input-password name="password"
                              label="Password"
                              fieldgroup="form-group"
                              placeholder="Enter password"
                              class="form-control" />


            <div class="d-flex w-100 justify-content-between align-items-center w-100 mt-3">

                <button type="submit"
                        class="btn btn-primary-subtle float-end">Sign
                    Un</button>
            </div>
            <div class="sign-info d-flex justify-content-between flex-column flex-lg-row align-items-center">
                <span class="dark-color d-inline-block line-height-2">Already Have Account?
                    <a href="{{ route('admin.sign.in') }}">Sign In</a></span>

            </div>
    </form>
</div>
