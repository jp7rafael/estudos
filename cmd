rake tmp:cache:clear
rake db:test:prepare
mkdir tmp/cache/test
rspec


rake tmp:cache:clear
rake db:reset
rake db:seed
rails r db/seeds_sample.rb
rails r "User.first.update_attribute('sa', true)"

rails s


foreman start
foreman start web
foreman start -c web=1,worker=2


rake apartment::migrate


heroku git:remote -a intercapture-qa
git push heroku banners-tracking-rails-4.x:master
git push -f heroku banners-tracking-rails-4.x:master

rake jobs:clear


heroku logs -p worker -t
heroku run rake jobs:work
heroku run rails console

Tenant.first.switch_schema
s = EventsByMonthJob.new(Event.first.attributes, Employee.first.id, User.first.id) 
s.perform
ap @job
ap self