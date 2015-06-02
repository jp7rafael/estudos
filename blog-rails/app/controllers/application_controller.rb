class ApplicationController < ActionController::Base
  # Prevent CSRF attacks by raising an exception.
  # For APIs, you may want to use :null_session instead.
  protect_from_forgery with: :exception

  around_action :scope_current_tenant

  def current_tenant
    Tenant.find_by_subdomain! request.subdomain
  end
  helper_method :current_tenant

    private
    def scope_current_tenant
        Tenant.current_id = current_tenant.id
        yield
    ensure
        Tenant.current_id = nil
    end
end
