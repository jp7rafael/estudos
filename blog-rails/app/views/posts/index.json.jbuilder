json.array!(@posts) do |post|
  json.extract! post, :id, :text, :number
  json.url post_url(post, format: :json)
end
